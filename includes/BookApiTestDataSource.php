<?php
class BookApiTestDataSource
{ 
    protected $api_key;

    protected $service_url;

    public function setApiKey($api_key)
    {
        $this->api_key = $api_key;
    }

    public function setServiceUrl($service_url)
    {
        $this->service_url = $service_url;
    }

    public function getBooksByIsbn($isbns)
    {
        $books = [];
        foreach ($isbns as $isbn)
        {
            $response = $this->getUrl('book/' . $isbn);
            if ($this->isSuccess($response))
            {
                $this->addBooks($books, $response);
            } else {
                return false;
            }
        }
        return $books;
    }

    public function getBooksByCollection($collection)
    {
        $books = [];
        $response = $this->getUrl('search?collection=' . $collection); 
        if ($this->isSuccess($response))
        {
            $this->addBooks($books, $response);
        }
        return $books;
    }

    protected function isSuccess(&$response)
    {
        return $response->status == 'success';
    }

    protected function addBooks(&$books, &$response)
    {
        if (is_array($response->data->book)) {
            $responseBooks = $response->data->book; 
        } elseif (is_array($response->data->search)) {
            $responseBooks = $response->data->search;
        } else {
            return;
        }

        foreach ($responseBooks as $book) {
            $books[] = $book;
        }
    }

    protected function getUrl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->service_url . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['x-apikey: ' . $this->api_key]);
        $data = curl_exec($ch);
        curl_close($ch);
        return json_decode($data);
    }
}

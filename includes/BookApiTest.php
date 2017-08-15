<?php
class BookApiTest
{
    protected $api_key;

    protected $service_url;

    protected $data_source;

    protected $data;

    protected $book_isbns;

    protected $book_collection;

    public function __construct($data_source, $book_isbns, $book_collection)
    {
        $this->api_key = get_option('bookapitest_api_key');
        $this->service_url = get_option('bookapitest_service_url');
        $this->data_source = $data_source;
        $this->data_source->setApiKey($this->api_key);
        $this->data_source->setServiceUrl($this->service_url);
        $this->book_isbns = $book_isbns;
        $this->book_collection = $book_collection;
    }

    public function loadBooks()
    {
        $filter = 'isbn';
        if (isset($_GET['filter']) && $_GET['filter'] == 'collection')
        {
            $filter = 'collection';
        }

        if ($filter == 'isbn')
        {
            $this->data = $this->data_source->getBooksByISBN($this->book_isbns);
        } else {
            $this->data = $this->data_source->getBooksByCollection($this->book_collection);
        }
    }

    public function redirect_to_books_custom_page()
    {
        if ($this->isAjaxRequest()) {
            include __DIR__ . '/books-partial.php'; 
        } else { 
            include __DIR__ . '/books-page.php'; 
        }
        die();
    }

    protected function isAjaxRequest()
    {
        return (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
    }
}

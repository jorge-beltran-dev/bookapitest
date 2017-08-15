<?php
/*
 * Plugin Name: BOOK API TEST
 * Description: Test for getting a list of books from remote API
 * Author: Jorge Beltran Boix
 * */

/* Admin Page with settings for the plugin */
require __DIR__ . '/includes/BookApiTestAdminMenuPage.php';
new BookApiTestAdminMenuPage();

/* Actions for the plugin, only when in books custom page */
add_action( 'wp', 'bookapitest_load_books_page');
function bookapitest_load_books_page() {
    if(is_page('books')){
        require __DIR__ . '/includes/BookApiTest.php';
        require __DIR__ . '/includes/BookApiTestDataSource.php';
        $data_source = new BookApiTestDataSource();

        //Hardcoded ISBNs and collection
        $book_isbns = ['9781509815494', '9781509800254', '9781509842186', '9781509842148', '9781509829941'];
        $book_collection = 'science-fiction-essentials';

        $bookApiTest = new BookApiTest($data_source, $book_isbns, $book_collection);
        $bookApiTest->loadBooks();
        $bookApiTest->redirect_to_books_custom_page();
    }
}

/* Add JS used in the plugin */
add_action('wp_enqueue_scripts', 'my_enqueue' );
function my_enqueue($hook) {
    wp_enqueue_script('bookapitest-script',
        plugins_url('/public/js/bookapitest.js', __FILE__ ),
        ['jquery']
    );
}

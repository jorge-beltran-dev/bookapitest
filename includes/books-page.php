<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <ul id="links">
            <li><a href="/index.php/books?filter=isbn">Books by ISBN</a></li>
            <li><a href="/index.php/books?filter=isbn" class="js-ajax-load">Books by ISBN (AJAX)</a></li>
            <li><a href="/index.php/books?filter=collection">Books by Collection</a></li>
            <li><a href="/index.php/books?filter=collection" class="js-ajax-load">Books by Collection (AJAX)</a></li>
        </ul>

        <ul id="books">
            <?php include __DIR__ . '/books-partial.php'; ?>
        </ul>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<?php get_footer();

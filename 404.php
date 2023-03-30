<?php

/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<main id="primary" class="site-main">
    <section class="error-404 not-found">
        <div class="page-content" style="text-align:center;">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/404.png" alt="404 error" />
        </div>
    </section>
</main>

<?php
get_footer();
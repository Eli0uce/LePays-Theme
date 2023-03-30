<?php get_header(); ?>

<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article>
                <h1><?php echo esc_html(get_the_title()); ?></h1>

                <?php the_content(); ?>
                <?php wp_link_pages(); ?>
                <?php edit_post_link(); ?>
            </article>

    <?php endwhile;
    endif; ?>
</main>

<?php get_footer(); ?>
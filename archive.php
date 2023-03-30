<?php get_header(); ?>

<main>
    <header>
        <h1><?php the_archive_title(); ?></h1>
        <?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?>
    </header>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article>
                <h2><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a></h2>

                <div class="entry-meta">
                    <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                    <span class="author"><?php echo esc_html(get_the_author()); ?></span>
                </div>

                <?php the_excerpt(); ?>
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Lire la suite', 'montheme'); ?></a>
            </article>

    <?php endwhile;
    endif; ?>

    <?php the_posts_pagination(); ?>
</main>

<?php get_footer(); ?>
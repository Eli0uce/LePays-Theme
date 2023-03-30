<?php get_header(); ?>


<main class="container mt-5">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <article>
                <span class="categories me-4"><?php the_category(', '); ?></span>
                <h1 class="entry-title text-center"><?php echo esc_html(get_the_title()); ?></h1>

                <div class="entry-meta mb-4 text-center">
                    <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                    <span class="author text-secondary"><em><?php echo esc_html(get_the_author()); ?></em></span>
                </div>

                <hr class="w-50 mb-5">

                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-thumbnail mb-4">
                        <?php the_post_thumbnail('large', array('class' => 'img-fluid')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <hr class="mb-4 mt-5 w-50">
                <?php the_tags('<span class="tags me-4">', ', ', '</span>'); ?>
                <?php comments_template(); ?>

                <div class="row my-5">
                    <div class="col-md-6 text-start">
                        <?php previous_post_link('%link', '<i class="fa fa-chevron-left"></i> Article précédent', TRUE); ?>
                    </div>
                    <div class="col-md-6 text-end">
                        <?php next_post_link('%link', 'Article suivant <i class="fa fa-chevron-right"></i>', TRUE); ?>
                    </div>
                </div>

            </article>

    <?php endwhile;
    endif; ?>

</main>

<?php get_footer(); ?>
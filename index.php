<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <?php get_header(); ?>
</head>

<style>
    .card-columns {
        max-width: 960px;
        margin: 0 auto;
        column-count: 2;
    }
</style>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <?php
                        $image_url = get_theme_mod('montheme_carousel_image1');
                        if ($image_url) { ?>
                            <img src="<?php echo esc_url($image_url); ?>" class="d-block w-100" alt="First slide">
                        <?php } else { ?>
                            <img src="https://i.imgur.com/ABwixvs.png" class="d-block w-100" alt="Default Image">
                        <?php } ?>
                    </div>
                    <div class="carousel-item">
                        <?php
                        $image_url = get_theme_mod('montheme_carousel_image2');
                        if ($image_url) { ?>
                            <img src="<?php echo esc_url($image_url); ?>" class="d-block w-100" alt="First slide">
                        <?php } else { ?>
                            <img src="https://i.imgur.com/fzJJpGU.png" class="d-block w-100" alt="Default Image">
                        <?php } ?>
                    </div>
                    <div class="carousel-item">
                        <?php
                        $image_url = get_theme_mod('montheme_carousel_image3');
                        if ($image_url) { ?>
                            <img src="<?php echo esc_url($image_url); ?>" class="d-block w-100" alt="First slide">
                        <?php } else { ?>
                            <img src="https://i.imgur.com/cKSHpD5.png" class="d-block w-100" alt="Default Image">
                        <?php } ?>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précèdent</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
    </div>

    <h1 class="text-center">Nouvelles</h1>
    <hr class="w-25 mx-auto mb-5">
    <div class="card-columns">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="card">
                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium', array('class' => 'card-img-top')); ?>
                        </a>
                    <?php } ?>
                    <div class="card-body">
                        <h5 class="card-category"><?php echo get_the_category_list(', '); ?></h5>
                        <h3 class="card-title"><?php echo esc_html(get_the_title()); ?></h3>
                        <p class="card-text"><?php the_excerpt(); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php esc_html_e('Voir Plus', 'montheme'); ?></a>
                    </div>
                </div>
            <?php endwhile; ?>
    </div>



    <?php
            if (get_next_posts_link()) {
                echo wp_kses_post(get_next_posts_link());
            }
    ?>
    <?php
            if (get_previous_posts_link()) {
                echo wp_kses_post(get_previous_posts_link());
            }
    ?>

<?php else : ?>

    <p><?php esc_html_e('Aucun article trouvé !', 'montheme'); ?></p>

<?php endif; ?>
</div>

<?php get_footer(); ?>
</body>

</html>
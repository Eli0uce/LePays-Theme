<?php get_header(); ?>

<style>
    ul {
        list-style: none;
    }
</style>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()) : ?>
                <h1 class="text-center"><?php single_cat_title(); ?></h1>
                <hr class="w-50 mb-5">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title"><?php the_title(); ?></h2>
                            <p class="card-text"><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire la suite</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else : ?>
                <p>Aucun article trouvé.</p>
            <?php endif; ?>
        </div>
        <aside class="col-md-4">
            <div class="card mb-4">
                <h5 class="card-header">Plus</h5>
                <div class="card-body">
                    <form class="form-inline mb-4" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                        <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Search" name="s" value="<?php echo get_search_query(); ?>">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">+</button>
                    </form>

                    <h6 class="card-subtitle mb-2"><u>Catégories</u></h6>
                    <ul class="list-group mb-4">
                        <?php wp_list_categories('title_li='); ?>
                    </ul>

                    <h6 class="card-subtitle mb-2"><u>Articles récents</u></h6>
                    <ul class="list-group mb-4">
                        <?php
                        $args = array(
                            'posts_per_page' => 5,
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'cat' => get_queried_object_id()
                        );
                        $query = new WP_Query($args);
                        if ($query->have_posts()) :
                            while ($query->have_posts()) :
                                $query->the_post();
                        ?>
                                <li class="list-group-item"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                            <?php endwhile; ?>
                        <?php endif;
                        wp_reset_postdata(); ?>
                    </ul>

                    <?php if (is_active_sidebar('sidebar-custom')) :
                        dynamic_sidebar('sidebar-custom');
                    endif; ?>
                </div>
            </div>
        </aside>
    </div>
</div>

<?php get_footer(); ?>
<aside class="sidebar">
  <!-- Barre de recherche -->
  <div class="widget">
    <?php get_search_form(); ?>
  </div>

  <!-- Liste des catégories -->
  <div class="widget">
    <h3>Catégories</h3>
    <ul>
      <?php wp_list_categories('title_li='); ?>
    </ul>
  </div>

  <!-- Liste des articles de la catégorie courante -->
  <?php if (is_category()) : ?>
    <div class="widget">
      <h3>Articles récents de cette catégorie</h3>
      <ul>
        <?php
        $args = array(
          'cat' => get_query_var('cat'),
          'posts_per_page' => 5
        );
        $recent_posts = new WP_Query($args);
        if ($recent_posts->have_posts()) :
          while ($recent_posts->have_posts()) :
            $recent_posts->the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </li>
        <?php endwhile;
        endif;
        wp_reset_postdata();
        ?>
      </ul>
    </div>
  <?php endif; ?>
</aside>

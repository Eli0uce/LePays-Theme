<?php
/*
Template Name: Evenements à venir
*/
?>

<?php get_header(); ?>

<div class="container">
	<h1 class="text-center"><?php single_cat_title(); ?></h1>
	<hr class="my-4 w-50">

	<div class="row">
		<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
				<div class="col-md-6 mb-4">
					<div class="card h-100">
						<?php if (has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title_attribute(); ?>"></a>
						<?php endif; ?>

						<div class="card-body">
							<h5 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<p class="card-text"><?php the_excerpt(); ?></p>
						</div>

						<div class="card-footer">
							<a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire la suite</a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		<?php else : ?>
			<p class="text-center">Aucun article dans cette catégorie pour le moment.</p>
		<?php endif; ?>
	</div>
</div>

<?php get_footer(); ?>
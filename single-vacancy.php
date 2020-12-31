<?php get_header(); ?>

<section class="vacancy_single">
	<div class="wrapper">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php the_content() ?>
		<?php endwhile; ?>
	</div>
</section>

<?php get_footer(); ?>
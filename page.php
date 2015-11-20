<?php 
	get_header(); 
?>


	
	<section class="row mainbg page-entry">
		<article class="col-md-12">
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="pageTitle"><?php the_title(); ?></h1>
				<?php the_content(); ?>
			<?php endwhile; ?>

		<?php else : ?>
			No content
		<?php endif; ?>

		</article>
	</section>

<?php get_footer(); ?>
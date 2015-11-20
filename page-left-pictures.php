<?php
	/* Template Name: Page w/ Left Images */
	
	get_header();
?>

	<section class="row mainbg page-entry">
		<article class="col-md-12">
		<?php if ( have_posts() ) : ?>

			<?php /* The loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<h1 class="pageTitle"><?php the_title(); ?></h1>
				
				<div class="col-md-4 picture-column">
					<?php $images = get_field('images'); ?>
					<?php foreach($images as $image): ?>
						<div class="row">
							<div class="col-md-12">
								<img src="<?php echo $image['image']['url']; ?>" alt="<?php echo $image['image']['title']; ?>" />
								<br/>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="col-md-8">
					<?php the_content(); ?>
				</div>
				
			<?php endwhile; ?>

		<?php else : ?>
			No content
		<?php endif; ?>

		</article>
	</section>

<?php get_footer(); ?>
<?php
  /* Template Name: Jobs */

  get_header();
  $jobs = get_posts(array('post_type' => 'jobs'));
?>

<section class="jobs archive">

  <h1 class="pageTitle"><?php the_title(); ?></h1>
  <div class="byline">
    <?php the_content(); ?>
  </div>

  <?php if (!have_posts()): ?>
    <p>
      There are currently no job openings.
    </p>
  <?php else: ?>
    <div class="job-opening heading row">
      <h4 class="col-xs-3 title">Title</h4>
      <h4 class="col-xs-3 department">Department</h4>
      <h4 class="col-xs-6 description">Description</h4>
    </div>
    <?php foreach ($jobs as $post): setup_postdata($post); ?>
      <div class="job-opening listing row">
        <div class="col-xs-3 title">
          <a href="<?php the_permalink(); ?>" title="Job opening: <?php the_title(); ?>"><?php the_title(); ?></a>
        </div>
        <div class="col-xs-3 department">
          <?php echo get_field('department'); ?>
        </div>
        <div class="col-xs-6 description">
          <?php echo get_the_excerpt(); ?>
        </div>
      </div>
    <?php endforeach; wp_reset_postdata(); ?>
<?php endif; ?>

</section>

<?php get_footer(); ?>

<?php
  /* Job Openings - Archive Page */

  get_header();
?>

<section class="jobs archive">

  <h1 class="pageTitle">Yankee Lobster Positions</h1>
  <p class="byline">
    Yankee Lobster Co. offers is expanding! We are offering a range of positions.<br/>
    We welcome you to join our team.
  </p>

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
    <?php while(have_posts()) : the_post(); ?>
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
    <?php endwhile; ?>
<?php endif; ?>

</section>

<?php get_footer(); ?>

<?php
  /* Job Openings - Archive Page */

  get_header();
?>

<section class="jobs">

  <h1 class="pageTitle">Job Openings</h1>

  <?php if (!have_posts()): ?>
    <p>
      There are currently no job openings.
    </p>
  <?php else: ?>
    <?php while(have_posts()) : the_post(); ?>
      <div class="job-opening">
        <h2><?php the_title(); ?></h2>
        <?php the_excerpt(); ?>
      </div>
    <?php endwhile; ?>
<?php endif; ?>

</section>

<?php get_footer(); ?>

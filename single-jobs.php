<?php
  /* Job Openings - Single Page */

  get_header();
  $jobPage = get_posts(array('name' => 'jobs', 'post_type' => 'page', 'post_status' => 'publish','posts_per_page' => 1));
?>

<section class="jobs single">
  <?php if ($jobPage): ?>
  <h1 class="pageTitle"><?php echo $jobPage[0]->post_title; ?></h1>
  <div class="byline"><?php echo apply_filters('the_content', $jobPage[0]->post_content); ?></div>
  <?php endif; ?>

  <div class="row">
    <!-- description -->
    <div class="col-md-8 job-description">
      <h3><?php the_title(); ?></h3>
      <div class="department">
        <h4><?php the_field('department'); ?></h4>
      </div>
      <div class="content">
        <?php the_content(); ?>
      </div>
    </div>

    <!-- application -->
    <div class="col-md-4 application-form">
      <h3>Apply Today!</h3>
      <?php
        gravity_form(
          1,
          false,
          false,
          false,
          array('job' => get_the_title() . ' (ID ' . get_the_ID() . ')'),
          true
        );
      ?>
    </div>
  </div>
</section>

<?php get_footer(); ?>

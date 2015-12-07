<?php
  /* Job Openings - Single Page */

  get_header();
?>

<section class="jobs single">
  <?php $jobPage = get_post(array('slug' => 'jobs')); ?>
  <?php setup_postdata($jobPage[0]); ?>
  <h1 class="pageTitle"><?php the_title(); ?></h1>
  <div class="byline"><?php the_content(); ?></div>
  <?php wp_reset_postdata(); the_post(); ?>

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

<script type="text/javascript">
(function ($) {
  $(document).ready(function () {
    // inject the post ID of the job
    $('.application-form form').applicationForm({
      jobId: '<?php the_ID(); ?>',
      jobFieldName: 'job-id'
    });
  });
}).call(this, jQuery);
</script>

<?php get_footer(); ?>

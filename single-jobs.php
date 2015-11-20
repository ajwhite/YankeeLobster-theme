<?php
  /* Job Openings - Single Page */

  get_header();
  the_post();
?>

<section class="jobs">

  <h1 class="pageTitle">Job Opening: <?php the_title; ?></h1>

  <div class="job-description">
    <?php the_content(); ?>
  </div>
</section>

<script type="text/javascript">
(function ($) {
  $(document).ready(function () {
    // inject the post ID of the job
    $('.job-description form').applicationForm({
      jobId: '<?php the_ID(); ?>',
      jobFieldName: 'job-id'
    });
  });
}).call(this, jQuery);
</script>

<?php get_footer(); ?>

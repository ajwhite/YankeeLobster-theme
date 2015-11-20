<?php
  /* Job Openings - Single Page */

  get_header();
  the_post();
?>

<section class="jobs">

  <h1 class="pageTitle">Job Opening: <?php the_title; ?></h1>

  <?php the_content(); ?>

  <form class="application-form" name="application">
    Application form here
    - PDF upload
    - Basic input fields
  </form>
</section>

<?php get_footer(); ?>

<?php
	/* Template Name: Home */

	get_header('inc');
?>

<style>
  .caviar-merchant-widget-button-1, .caviar-merchant-widget-button-1 a {width:200px;min-height:50px;padding:0;}
  .caviar-merchant-widget-button-1 a span {visibility: hidden;}
  .caviar-merchant-widget-link-button-1 {display: block;background-image: url('https://img.trycaviar.com/raw/widget/v3/caviar-badges-sprite-v3.png');background-position: -0px -0px;}
  .caviar-merchant-widget-link-button-1:hover {background-position: -200px -0px;}
  .caviar-merchant-widget-link-button-1:active {background-position: -400px -0px;}
  @media only screen and (-Webkit-min-device-pixel-ratio: 1.5),only screen and (-moz-min-device-pixel-ratio: 1.5),only screen and (-o-min-device-pixel-ratio: 3/2),only screen and (min-device-pixel-ratio: 1.5) {
    .caviar-merchant-widget-link-button-1 {display: block;background-image: url('https://img.trycaviar.com/raw/widget/v3/caviar-badges-sprite-v3@2x.png');background-size: 1560px 390px;}}
</style>

<div class="container">


	<header id="home-header">
		<div class="header-top">

			<div class="on-the-road">

				<a href="<?php the_field('food_network_url','option'); ?>" id="home-fnw" target="_blank" title="<?php the_field('food_network_title','option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/foodNetwork.png"/></a>
			</div>
			<div class="door-dash">
				<a href="#"><img src="http://i.imgur.com/gJnOrRl.png" /></a>
			</div>
			<div class='caviar-merchant-widget-button-1'>
				<div class='caviar-merchant-widget-content' style='text-align: center;'>
					<a href="https://www.trycaviar.com/t/boston/yankee-lobster-co-2204?groups=f_online__d_dwidget-3-button-1__p_marketing__c_merchant-links&utm_medium=dwidget-3-button-1&utm_source=marketing&utm_campaign=merchant-links&utm_term=boston&utm_content=yankee-lobster-co-2204" class="caviar-merchant-widget-link-button-1" ><span>Yankee Lobster Co., delivered by Caviar</span></a>
				</div>
			</div>
			<div id="orderTop">
					<span>
						<a id="order-text" href="/shop">Order Online</a>
					</span>
					<a href="tel:<?php the_field('store_telephone','option'); ?>" id="phone-num"><?php the_field('store_telephone', 'option'); ?></a>
			</div>


		</div>
		<div style="clear:both;"></div>

		<div class="slidearea row">
			<img id="lobstahh" alt="The Yankee Lobster" src="<?php echo get_template_directory_uri(); ?>/assets/images/lobstahh.png"	/>
			<div id="owl-demo">
				<?php $slides = get_field('slider'); ?>
				<?php foreach($slides as $slide): ?>
					<div class="item"><img src="<?php echo timthumb($slide['slide']['url'], array('w' => 960, 'h' => 580)); ?>" /></div>
				<?php endforeach; ?>
			</div>
		</div>


		<div class="navArrowHolder row">
				<a class="col-md-1 navArrow prev"></a>
				<a class="col-md-1 col-md-offset-10 navArrow next"></a>
		</div>


		<nav class="homeNavBar row">
			<?php wp_nav_menu(array('theme_location' => 'header-navigation')); ?>
		</nav>

	</header>



	<section id="home-main-content">

		<div id ="main-content" class="row mainbg">

			<div class="col-md-8" id="left-main">

				<article class="new-entry" id="first-entry">
					<hr/>
					<?php the_content(); ?>
				</article>



			</div>

			<div class="col-md-4" id="right-main">
				<?php echo get_sidebar('weekly-specials'); ?>
			</div>

		</div>


	</section>

	<section>

		<div class="row mainbg" id="social-stuff">

			<div class="col-md-12">

				<div class="row">

					<div id="twitter-col" class="col-md-4 social-blurbs">
						<?php echo get_sidebar('twitter'); ?>
					</div>

					<div id="facebook-col" class="col-md-4 social-blurbs">
						<?php echo get_sidebar('facebook'); ?>
					</div>

					<div id="yelp-col" class="col-md-4 social-blurbs">
						<?php echo get_sidebar('yelp'); ?>
					</div>


				</div>

			</div>


		</div>



	</section>


<script src='https://d2nslu7z045kl0.cloudfront.net/caviar-widgets-v3.js'></script>
<?php get_footer(); ?>

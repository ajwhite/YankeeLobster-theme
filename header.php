<?php get_header('inc'); ?>


	<div class="cloudy">
	
		<div class="container">

			<header class="normal-header">
				
				<a href="/" title="Yankee Lobster Homepage"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/lobster-header-img.png" id="lobby" alt="Yankee Lobster" /></a>
			
				<nav class="normal-nav row">
					<a href="<?php the_field('food_network_url','option'); ?>" id="foodNet" target="_blank" title="<?php the_field('food_network_title','option'); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/foodNetwork.png"/></a>
					<div class="normal-overlay"></div>
					<?php wp_nav_menu(array('theme_location' => 'header-navigation')); ?>
				</nav>
					
			</header>
		
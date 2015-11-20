<?php
	/* Template Name: Menu */
	
	get_header();
	$menu = get_field('menu_section');
	$menu = partitionList($menu, 3);
	$drinks = get_field('beer_wine');	
	
	$colors = array(
		'orange', 'green', 'teal', 'red', 'yellow'
	);
?>

		
			<section class="row mainbg" id="menu-content">
				<h1 class="pageTitle">Menu</h1>
				
				
				<div class="row">
				<?php $n=0; foreach($menu as $i=>$menu_group): ?>
				<div class="col-md-4" <?php if ($i==1) { echo "id='middle-col'"; } ?>>
					<?php if ($i==1): ?>
					<span id="lobster-roll-price"><?php the_field('lobster_roll'); ?></span>
					<?php endif; ?>
				
					<?php foreach($menu_group as $group): ?>
						<div class="row">
							<h3 class="menu-header"><?php echo $group['title']; ?></h3>
							<ul class="menu-list">
								<?php foreach($group['menu_items'] as $item): ?>
								<li class="<?php echo $colors[$n%count($colors)]; ?>">
									<?php echo $item['title']; ?>
									<span><?php echo $item['price']; ?></span>
									<div class="clear"></div>
									<?php if (!empty($item['sub_text'])): ?>
									<span class="sub-txt <?php echo $colors[($n+1)%count($colors)]; ?>"><?php echo $item['sub_text']; ?></span>
									<div class="clear"></div>
									<?php endif; ?>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php $n++; endforeach; ?>
				</div>
				<?php endforeach; ?>
				</div>
				<div class="row">
					<div class="col-md-4">
						<img class="tripleD" src="<?php echo get_template_directory_uri(); ?>/assets/images/tripleD2.png" />
					</div>
					<div class="col-md-4">
							
						<div class="row BoC">
							
							<div id="bigbucket"><?php the_field('bucket_o_crabs_large'); ?></div>
							<div id="medbucket"><?php the_field('bucket_o_crabs_med'); ?></div>
							<div id="lilbucket"><?php the_field('bucket_o_crabs_small'); ?></div>
							
							
						</div>
					</div>
					<div class="col-md-4">
						<?php if (!empty($drinks)): ?>
						<div class="row">
							<h3 class="menu-header">Beer + Wine</h3>
							<ul class="menu-list">
								<?php foreach ($drinks as $i=>$drink): ?>
								<li class="<?php echo $colors[$i%(count($colors)-1)]; ?>"><?php echo $drink['drink']; ?></li>
								<?php endforeach; ?>		
							</ul>
						</div>
						<?php endif; ?>
					</div>
				</div>
				
				
								
				
			</section>
			
<?php get_footer(); ?>

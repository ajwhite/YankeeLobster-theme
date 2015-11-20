<?php 
	/* Market Prices - Archive Page */
	
	get_header(); 
	
	$marketPrices = getMarketPrices();
?>

	<section class="mainbg" id="zanti-history">
		
		<div class="row mp-nav">
			<h1 class="pageTitle">Market Prices</h1>
			
			<div class="pictureNav col-md-offset-2 col-md-8">
				<?php foreach($marketPrices as $i=>$mp): ?>
					<a class="navButton col-md-2" title="View Yankee Lobster's <?php echo $mp['nav']; ?> market prices" href="#m-group<?php echo $i; ?>"><?php echo $mp['nav']; ?></a>
				<?php endforeach; ?>
			</div>
			
		</div>
		
		<?php foreach($marketPrices as $i=>$mp): ?>
		<div class="mp-food-type row">
		
			<div class="col-md-4 pic-hold">
				
				<img src="<?php echo timthumb($mp['image'][0], array('w'=>260, 'h' => 210,'zc'=>1)); ?>" class="product-img" />

			</div>
			
			<div class="col-md-8 mp-info" id="m-group<?php echo $i; ?>">
				
				<p class="mp-item-header rtxt"><?php echo $mp['title']; ?>: <span class="wtxt"><?php echo $mp['tagline']; ?></span></p>
				<div class="mp-redline" id="redline"></div>
				
				<div class="row">
					<ul class="mp-item-list col-md-12">
					<?php foreach($mp['prices'] as $item): ?>
						<li><div><?php echo $item['item']; ?></div><span><?php echo $item['price']; ?></span><div class="clear"></div></li>
					<?php endforeach; ?>
					</ul>
					<div class="clear"></div>
				</div>
							
			</div>
			
		</div>
		<?php endforeach; ?>	
	</section>
	
	
	
<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$(".pictureNav .navButton").click(function(e){
			e.preventDefault();
			var target = $(this).attr('href');
			$("html,body").animate({
				scrollTop: ($(target).offset().top - 50) + 'px'
			});
			return false;
		});
	});
})(jQuery);
</script>


<?php get_footer(); ?>
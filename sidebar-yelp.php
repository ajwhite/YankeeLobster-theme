<?php $yelpReviews = getYelpReviews(); ?>

<h3>Latest Yelp Reviews</h3>

<?php foreach($yelpReviews['reviews'] as $review): ?>
<div class="twitter-entry row">
							
	<div class="social-name-pic row">
		<div class="col-md-2 twit-pic-holder">
			<img src="<?php echo $review['user']['image_url']; ?>">
		</div>
		<div class="col-md-10">
			<div class="social-name"><?php echo $review['user']['name']; ?></div>
			<div class="social-date">
				<?php echo date("M d Y", $review['time_created']); ?> | 
				<?php echo date("H i A", $review['time_created']); ?>
			</div>
			<div class="yelp-stars">				
				<?php for($i=0; $i<intval($review['rating']); $i++): ?>
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/star.png" width="18" height="18" />
				<?php endfor; ?>		
			</div>		
		</div>
	</div>
	
	<div class="social-message">
		<?php echo $review['excerpt']; ?>
	</div>
</div>
<?php endforeach; ?>


<a href="http://www.yelp.com/biz/yankee-lobster-fish-market-boston" title="View more Yankee Lobster reviews on Yelp" target="_blank">View More Yelp Reviews &gt;</a>
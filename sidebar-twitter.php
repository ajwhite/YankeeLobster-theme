<?php $tweets = getLatestTweets(); ?>

<h3>Latest Tweets</h3>

<?php foreach($tweets as $tweet): ?>
<div class="twitter-entry row">				
	<div class="social-name-pic row">
		<div class="col-md-2 twit-pic-holder">
			<img src="<?php echo $tweet['user']->profile_image_url; ?>">
		</div>
		<div class="col-md-10">
			
			<div class="social-name">@<?php echo $tweet['user']->screen_name; ?></div>

			<div class="social-date"><?php echo date("M d Y", strtotime($tweet['createdat'])); ?> | <?php echo date("H i A", strtotime($tweet['createdat'])); ?></div>
			
		</div>
		
	</div>
	
	<div class="social-message">
		<?php echo $tweet['text']; ?>
	</div>
</div>

<?php endforeach; ?>

<a href="http://www.twitter.com" title="Visit Yankee Lobster on Twitter" target="_blank">View More Tweets &gt;</a>
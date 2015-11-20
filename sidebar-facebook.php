<?php if (false): ?>

<?php $facebookPosts = getFacebookPost(); ?>

<h3>Latest Facebook Posts</h3>

<?php foreach($facebookPosts as $facebookPost): ?>
<div class="twitter-entry row">
	
	<div class="social-name-pic row">
		<div class="col-md-2 twit-pic-holder">
			<img src="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-ash3/s160x160/1486920_592149020822671_1021284444_a.jpg">
		</div>
		<div class="col-md-10">
			
			<div class="social-name">Yankee Lobster</div>

			<div class="social-date"><?php echo date("M d Y", $facebookPost['timestamp']); ?> | <?php echo date("H i A",$facebookPost['timestamp']); ?></div>
			
		</div>
		
	</div>
	
	<div class="social-message">
		<?php echo $facebookPost['content']; ?>
		<?php if ($facebookPost['type'] == 'photo' && !empty($facebookPost['image'])): ?>
		<a href="<?php echo $facebookPost['image']; ?>" data-lightbox="facebook" title="<?php echo $facebookPost['content']; ?>"><img src="<?php echo $facebookPost['image']; ?>" alt="<?php echo $facebookPost['content']; ?>" /></a>
		<?php endif; ?>
	</div>
	
	
</div>
<?php endforeach; ?>
<a href="https://www.facebook.com/pages/Yankee-Lobster-Co/111734038864174" title="Visit Yankee Lobster on Facebook" target="_blank">View All Facebook Posts &gt;</a>


<?php endif; ?>
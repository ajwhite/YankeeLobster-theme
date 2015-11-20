<?php
	/* Photo Gallery - Archive Page */
	
	get_header();
	
	$galleries = getGallery();
?>

<section class="row mainbg">
	<h1 class="pageTitle">Photo Gallery</h1>
	
	<div class="pictureNav col-md-offset-2 col-md-8">
		<?php foreach($galleries as $i=>$gallery): ?>
		<a class="navButton col-md-2 <?php echo $i==0 ? 'active':''; ?>" title="View Yankee Lobster <?php echo $gallery['title']; ?> photo gallery" href="#gallery-<?php echo $i; ?>"><?php echo $gallery['title']; ?></a>
		<?php endforeach; ?>
		
	</div>
	
	<?php foreach($galleries as $i=>$gallery):?>
		
		<div class="gallery col-md-12" id="gallery-<?php echo $i; ?>">
			<div class="row gallery-row">
				<?php $n=0; foreach($gallery['gallery'] as $item): $n++; ?>
				<div class="col-md-4 gallery-item">
					<a href="<?php echo $item['image']['sizes']['large']; ?>" data-lightbox="gallery-<?php echo $i; ?>" title="<?php echo $item['title']; ?>">
						<img src="<?php echo timthumb($item['image']['sizes']['medium'], array('w'=>250, 'h'=>150,'zc'=>1)); ?>" alt="<?php echo $item['image']['title']; ?>" />
					</a>
				</div>
				
				<?php if ($n>=3): ?>
				</div><!-- end row -->
				<div class="row gallery-row">
				<?php $n=0; endif; ?>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endforeach; ?>
	
</section>

<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$(".pictureNav .navButton").click(function(){
			var target = $(this).attr('href');
			$(".pictureNav .navButton").removeClass('active');
			$(this).addClass('active');
			$(".gallery").fadeOut(500, function(){
				$(target).fadeIn();
			});
			return false;
		});
	});
})(jQuery);
</script>

<style type="text/css">
.gallery { display:none; }
#gallery-0 { display:block; }
.gallery-item img { max-width: 100%; }
</style>
<?php get_footer(); ?>
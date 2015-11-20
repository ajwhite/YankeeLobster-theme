<?php
	/* Template Name: Contact */
	
	get_header();
?>

<script type="text/javascript">
(function($){
	$(document).ready(function(){
		$("#contact-form").validate({
			rules: {
				contact_name: { required: true },
				contact_email: { required: true },
				contact_msg : { required: true }
			}
		});
	
		$("#submit-button").click(function(){
			if (!$("#contact-form").valid()){
				return false;
			}
			var data = {
				action: 'submitContactForm',
				name : $("#contact_name").val(),
				email: $("#contact_email").val(),
				number: $("#contact_number").val(),
				message: $("#contact_msg").val(),
				nonce: '<?php echo wp_create_nonce('submitContactForm'); ?>'
			};
			
			$.post('/wp-admin/admin-ajax.php', data);
			
			$("#contact-form").slideUp(500, function(){
				$("#contact-success").fadeIn();
			});
			return false;
		});
	});
})(jQuery);
</script>
	<section class="row mainbg" id="zanti-history">
		<br/><br/>
		<div class="col-md-6">
			
			<div class="row">
				
				<div class="col-md-12">
					<?php echo get_sidebar('hours'); ?>
				</div>
				
			</div>
			
		</div>
		
		<div class="col-md-6">
			
			<div class="row">
				
				<div class="col-md-12">
					<h2>Send us an email!</h2>
					
					<form id="contact-form">
						<div class="input-row">
							<input id="contact_name" name="contact_name" class="contact-input" type="text" placeholder="Name:"/>								</div>
						<div class="input-row">
							<input id="contact_number" name="contact_number" class="contact-input" type="text" placeholder="Number:"/>
						</div>
						<div class="input-row">
							<input id="contact_email" name="contact_email" class="contact-input" type="text" placeholder="Email:"/>
						</div>
						<div class="input-row">
							<textarea class="contact-input" name="contact_msg" id="contact_msg" type="text" placeholder="Message:"></textarea>
						</div>

						<button class="product-button" id="submit-button">Submit</button>
					</form>
					<p id="contact-success" style="display:none;">
						Thank you for contacting us! we will be in touch shortly.
					</p>
				</div>
				
			</div>
			
		</div>

						
		
	</section>
	
	<section class="row mainbg">
		
		<div class="col-md-12">
			
			<h2>Directions</h2>
			
			<div class="row dir-overview">
				
				<div class="col-md-offset-2 col-md-8">
					
					<p class="dir-txt indent"><?php the_field('directions_text'); ?></p>

				</div>

			</div>
			
			<div class="row direction-row">
				<?php $directions = get_field('directions'); ?>
				<?php foreach($directions as $direction): ?>
				<div class="col-md-6 dir-txt">
					
					<span class="fff"><?php echo $direction['title']; ?>:</span>
					<?php echo $direction['directions']; ?>
					


					
				</div>
				<?php endforeach; ?>
			</div>
			
			
		</div>
		

	</section>



<?php get_footer(); ?>
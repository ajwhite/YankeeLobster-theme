

			<footer>
				<div class="footer-top mainbg"></div>
				
				<div class="row">
					<div class="col-md-6" >Yankee Lobster Company &copy; <?php echo date("Y"); ?> | All Rights Reserved</div>
					<div class="col-md-offset-4 col-md-2">
						<a href="http://instagram.com/YankeeLobsterCo" title="Visit Yankee Lobster on Instagram" target="_blank" class="footer-social-button" id="insta-btn"></a>
						<a href="https://twitter.com/YankeeLobster" title="Visit Yankee Lobster on Twitter" target="_blank" class="footer-social-button" id="twit-btn"></a>
						<a href="https://www.facebook.com/pages/Yankee-Lobster-Co/111734038864174" title="Visit Yankee Lobster on Facebook" target="_blank" class="footer-social-button" id="face-btn"></a>
						<div class="clear"></div>
					</div>		
				</div>
				
				<div class="row">
					<div class="col-md-12 footer-nav">
						<?php wp_nav_menu(array('theme_location' => 'header-navigation')); ?>
					</div>
				</div>
			</footer>
		
		
		</div>
		
	</div>
	
	<?php wp_footer(); ?>
</body>

</html>

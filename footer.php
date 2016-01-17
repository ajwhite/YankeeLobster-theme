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
<script> 
var pagename = location.pathname;
if(pagename == '/menu/') { document.getElementsByClassName("row")[2].innerHTML = '<div id="menusContainer"></div>'; }
</script>
<script type="text/javascript" src="https://menus.singleplatform.co/businesses/storefront/?apiKey=ke09z8icq4xu8uiiccighy1bw">
</script>
<script>
var pagename = location.pathname;
if(pagename == '/menu/') {
document.getElementById('menusContainer').innerHTML = '';
document.getElementById('menusContainer').style.display = 'block';
    var options = {};
    options['PrimaryBackgroundColor'] = 'Transparent';
    options['MenuDescBackgroundColor'] = 'Transparent';
    options['SectionTitleBackgroundColor'] = 'Transparent';
    options['SectionDescBackgroundColor'] = 'Transparent';
    options['ItemBackgroundColor'] = 'Transparent';
    options['PrimaryFontFamily'] = 'Arial';
    options['BaseFontSize'] = '14px';
    options['FontCasing'] = 'Default';
    options['PrimaryFontColor'] = '#9c9c9c';
    options['MenuDescFontColor'] = '#9c9c9c';
    options['SectionTitleFontColor'] = '#ffffff';
    options['SectionDescFontColor'] = '#ffffff';
    options['ItemTitleFontColor'] = '#9c9c9c';
    options['FeedbackFontColor'] = '#9c9c9c';
    options['ItemDescFontColor'] = '#9c9c9c';
    options['ItemPriceFontColor'] = '#9c9c9c';
    options['HideDisplayOptionPhotos'] = 'true';
    options['HideDisplayOptionFeedback'] = 'true';
    options['HideDisplayOptionDisclaimer'] = 'true';
    options['HideDisplayOptionClaim'] = 'true';
    options['MenuTemplate'] = '2';
    options['DisplayMenu']  = '589392';
    new BusinessView("yankee-lobster-co", "menusContainer", options);
    }
</script>
</body>

</html>
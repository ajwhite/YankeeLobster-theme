<?php
	$hours 	= get_field('store_hours','option');
	$phone 	= get_field('store_telephone','option');
	$fax	= get_field('store_fax','option');
	$emails	= get_field('store_emails','option');
	$address= get_field('store_address','option');
?>

<div id="hoursLocation">
	<h2>Store hours & Location</h2>

	<div class="row">
		<div class="col-md-12 hours">			
			We're open
			<br/>
			<?php echo $hours; ?>
			<br/><br/>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			If you have any questions or would like to place an order, We'd be happy to talk with you	
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<div class="yankeeMap" id="map_canvas"></div>
		</div>
	</div>
	
	<div class="row contact-methods">
		<div class="col-md-6 address">
			<?php echo $address; ?>
		</div>
		<div class="col-md-6">
			<div class="row">
				<div class="col-md-6">Telephone:</div>
				<div class="col-md-6"><?php echo $phone; ?></div>
			</div>
			<div class="row">
				<div class="col-md-6">Fax:</div>
				<div class="col-md-6"><?php echo $fax; ?></div>
			</div>
			<div class="row">
				<div class="col-md-12">
					Email:
					<?php foreach($emails as $email): ?>
						<br/>
						<a class="redtext owner-email" title="Email a Yankee Lobster owner" href="mailto:<?php echo $email['email']; ?>"><?php echo $email['email']; ?></a>
					<?php endforeach; ?>					
				</div>
			</div>
		</div>
	</div>
</div>

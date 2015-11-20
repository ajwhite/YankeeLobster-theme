<?php
	$colors = array(
		'yellow', 'green', 'teal', 'red'
	);
	$weekly_specials = getWeeklySpecials();
?>



<span id="weekly-specials">
	<span class="wtxt">W</span><span class="rtxt">e</span><span class="wtxt">e</span><span class="rtxt">k</span><span class="wtxt">l</span><span class="rtxt">y</span><span class="wtxt"> </span><span class="wtxt">S</span><span class="rtxt">p</span><span class="wtxt">e</span><span class="rtxt">c</span><span class="wtxt">i</span><span class="rtxt">a</span><span class="wtxt">l</span><span class="rtxt">s</span>
</span>

<?php foreach($weekly_specials as $i=>$special): ?>
<div class="row">
	<div class="special-name col-md-9 <?php echo $colors[$i%4]; ?>"><?php echo $special['name']; ?></div>
	<div class="special-price col-md-3">$<?php echo $special['price']; ?></div>										
</div>
<?php endforeach; ?>

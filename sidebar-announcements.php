<?php
  $announcements = get_field('announcements');
?>

<?php foreach ($announcements as $announcement): ?>
<div class="announcement-box">
  <span class="announcement-title">
    <?php $titleSegments = explode(" ", $announcement['title']); ?>
    <?php foreach ($titleSegments as $segment): ?>
      <?php $titleParts = str_split($segment); ?>
      <?php foreach ($titleParts as $i=>$letter): ?><span class="<?php echo $i % 2 == 0 ? 'wtxt' : 'rtxt'; ?>"><?php echo $letter; ?></span><?php endforeach; ?>
    <?php endforeach; ?>
  </span>
  <div class="announcement-content">
    <?php echo $announcement['content']; ?>
  </div>
</div>
<?php endforeach; ?>

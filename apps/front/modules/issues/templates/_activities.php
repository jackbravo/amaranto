<?php include_once sfConfig::get('sf_lib_dir').'/vendor/Markdown/markdown.php' ?>
<div class="issue-activities">
<?php foreach ($activities as $activity): ?>
  <div class="issue-activity">
    <p class="activity-timestamp">
      <strong><?php echo $activity->verb ?> by <?php echo $activity->CreatedBy ?></strong>
      <small><?php echo $activity->created_at ?></small>
    </p>
    <blockquote class="activity-changes">
      <?php echo nl2br($activity->changes) ?>
    </blockquote>
    <?php echo Markdown($activity->body) ?>
  </div>
<?php endforeach; ?>
</div> <!-- /issue-history -->

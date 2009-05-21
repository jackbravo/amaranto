<div class="issue-activities">
<?php foreach ($activities as $activity): ?>
  <div class="issue-activity">
    <p class="activity-timestamp">
      <strong><?php echo $activity->verb ?> by <?php echo $activity->CreatedBy ?></strong>
      <small><?php echo $activity->created_at ?></small>
    </p>
    <blockquote class="activity-changes">
      <?php echo simple_format_text($activity->changes) ?>
    </blockquote>
    <?php error_reporting(E_ALL) ?>
    <?php echo Markdown::parseToString($activity->body, MARKDOWN::NOPANTS) ?>
    <?php error_reporting(E_ALL|E_STRICT) ?>
  </div>
<?php endforeach; ?>
</div> <!-- /issue-history -->

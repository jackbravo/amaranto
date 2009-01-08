<?php use_helper('Text') ?>
<div class="grid_8">

  <h1><?php echo $issue->title ?> <small>(<?php echo $issue->Category ?>)</small></h1>
  Assigned to <strong><?php echo $issue->AssignedTo ?></strong>
  | Priority - <strong><?php echo $issue->Priority->id.' '.$issue->Priority ?></strong>

  <hr />

  <div class="issue-activities">
  <?php foreach ($issue->Activities as $activity): ?>
    <div class="issue-activity">
      <p class="activity-timestamp">
        <strong><?php echo $activity->verb ?> by <?php echo $activity->CreatedBy ?></strong>
        <small><?php echo $activity->created_at ?></small>
      </p>
      <blockquote class="activity-changes">
        <?php echo simple_format_text($activity->changes) ?>
      </blockquote>
      <?php echo simple_format_text($activity->body) ?>
    </div>
  <?php endforeach; ?>
  </div> <!-- /issue-history -->

  <hr />

  <a href="<?php echo url_for('issues_edit', $issue) ?>">Edit</a>
  &nbsp;
  <a href="<?php echo url_for('issues') ?>">List</a>

</div> <!-- /grid_8 -->

<div class="grid_4">
  <div class="issue-id-box">
    <h1 class="issue-id">
      <?php echo link_to($issue->id, 'issues_show', $issue) ?>
    </h1>
    <strong class="issue-status"><?php echo $issue->Status ?></strong>
  </div>

  <div class="issue-location">
    <?php if ($issue->Project->exists()): ?>
      <strong>Project.</strong> <?php echo $issue->Project ?><br/>
    <?php endif; ?>
    <?php if ($issue->Component->exists()): ?>
      <strong>Component.</strong> <?php echo $issue->Component ?><br/>
    <?php endif; ?>
    <?php if ($issue->Milestone->exists()): ?>
      <strong>Milestone.</strong> <?php echo $issue->Milestone ?><br/>
    <?php endif; ?>
  </div>

  <br/>
  <div class="issue-estimate">
    <?php if ($issue->curr_estimate): ?>
      <strong>Estimate.</strong> <?php echo $issue->curr_estimate ?><br/>
    <?php endif; ?>
    <?php if ($issue->elapsed): ?>
      <strong>Elapsed.</strong> <?php echo $issue->elapsed ?><br/>
      <strong>Remaining.</strong> <?php echo $issue->curr_estimate - $issue->elapsed ?><br/>
    <?php endif; ?>
  </div>

  <br/>
  <?php if ($issue->deadline): ?>
    <strong>Deadline.</strong> <?php echo $issue->deadline ?><br/>
  <?php endif; ?>
</div> <!-- /grid_4 -->

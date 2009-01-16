<?php use_helper('Text') ?>
<div class="grid_8">

  <h1><?php echo $issue->title ?> <small>(<?php echo $issue->Category ?>)</small></h1>
  Assigned to <strong><?php echo $issue->AssignedTo ?></strong>
  | Priority - <strong><?php echo $issue->Priority ?></strong>

  <hr />
  <?php include_partial('activities', array('activities' => $issue->Activities)) ?>
  <hr />

  <?php echo link_to('Edit', 'issues_edit', $issue) ?>
  &nbsp;<?php echo link_to('List', 'issues') ?>

</div> <!-- /grid_8 -->

<div class="grid_4">
  <div class="issue-id-box">
    <h1 class="issue-id">
      <?php echo link_to($issue->id, 'issues_show', $issue) ?>
    </h1>
    <strong class="issue-status"><?php echo $issue->Status ?></strong>
  </div>

  <div class="issue-location">
    <?php if ($issue->project_id): ?>
      <strong>Project.</strong> <?php echo $issue->Project ?><br/>
    <?php endif; ?>
    <?php if ($issue->component_id): ?>
      <strong>Component.</strong> <?php echo $issue->Component ?><br/>
    <?php endif; ?>
    <?php if ($issue->milestone_id): ?>
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
      <?php if (!$issue->is_resolved): ?>
        <strong>Remaining.</strong> <?php echo $issue->curr_estimate - $issue->elapsed ?><br/>
      <?php endif; ?>
    <?php endif; ?>
  </div>

  <br/>
  <?php if ($issue->deadline): ?>
    <strong>Deadline.</strong> <?php echo $issue->deadline ?><br/>
  <?php endif; ?>
</div> <!-- /grid_4 -->

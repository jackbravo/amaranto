<div class="grid_12">

<h1>Issues List</h1>

<div id="filters">
<form action="<?php echo url_for('@issues_filter') ?>" method="post">
  <?php echo $filter->renderGlobalErrors() ?>
  <?php echo $filter->renderHiddenFields() ?>

  <?php echo $filter['is_closed']->renderRow() ?>
  <?php echo $filter['category_id']->renderRow() ?>
  <?php echo $filter['assigned_to']->renderRow() ?>

  <input type="submit" value="Filter" />
  &nbsp;<?php echo link_to('Reset', '@issues_filter', array('query_string' => '_reset', 'method' => 'post')) ?>
</form>
</div>

<table class="issues list">
  <thead>
    <tr>
      <th></th>
      <th>Issue</th>
      <th>Title</th>
      <th>Status</th>
      <th>Opened by</th>
      <th>Priority</th>
      <th>Deadline</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($pager->getResults() as $i => $issue): ?>
    <tr class="<?php
        echo fmod($i,2) == 0 ? 'even' : 'odd';
        echo $issue['is_resolved'] ? ' resolved' : ' open';
      ?>">
      <td><div style="width:30px;"><?php echo $issue['Category']['name'] ?></div></td>
      <td><div style="width:40px;"><?php echo link_to($issue['id'], 'issues_show', $issue) ?></div></td>
      <td><div style="width:450px;"><?php echo link_to($issue['title'], 'issues_show', $issue) ?></div></td>
      <td><div style="width:80px"><?php echo $issue['Status']['name'] ?></div></td>
      <td><div style="width:80px"><?php echo $issue['OpenedBy']['username'] ?></div></td>
      <td><div style="width:105px"><?php echo $issue['priority_id'] . ". " . $issue['Priority']['name'] ?></div></td>
      <td><div style="width:80px"><?php echo $issue->getdeadline() ?></div></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include_partial('contacts/pager', array('pager' => $pager)) ?>

<a href="<?php echo url_for('issues_new') ?>">New</a>

</div> <!-- /grid_12 -->


<div class="grid_12">

<h1>Issues List</h1>

<div id="filters">
<form action="<?php echo url_for('@issues_filter') ?>" method="post">
  <?php echo $filter->renderGlobalErrors() ?>
  <?php echo $filter->renderHiddenFields() ?>

  <?php echo $filter['is_closed']->renderRow() ?>
  <?php echo $filter['category_id']->renderRow() ?>
  <?php echo $filter['assigned_to']->renderRow() ?>
  <?php echo $filter['project_id']->renderRow() ?>

  <input type="submit" value="Filter" />
  &nbsp;<?php echo link_to('Reset', '@issues_filter', array('query_string' => '_reset', 'method' => 'post')) ?>
</form>
</div>

<?php
  $project_id = false;
  $total_no_estimate = 0;
  $total_estimate = 0;
  $total_elapsed = 0;
  foreach ($pager->getResults() as $i => $issue) {
    if ($issue->curr_estimate) {
      $total_estimate += $issue->curr_estimate;
      $total_elapsed += $issue->elapsed;
    } else {
      $total_no_estimate++;
    }
    if ($project_id !== $issue->project_id) {
      echo "</tbody></table>";
      $project_id = $issue->project_id;
      $close_table = true;
?>
<table class="issues list">
  <caption><?php echo $issue->Project ?></caption>
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
  <?php } ?>
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
<?php } ?>
  </tbody>
</table>

<?php include_partial('contacts/pager', array('pager' => $pager)) ?>

<a href="<?php echo url_for('issues_new') ?>">New</a>

<table class="small issue-stats">
  <thead><tr><th colspan="2">Stats for this page</th></thead>
  <tbody>
    <tr>
      <td>Total estimated time remaining</td>
      <td><?php echo $total_estimate - $total_elapsed ?></td>
    </tr>
    <tr>
      <td>Total elapsed time</td>
      <td><?php echo $total_elapsed ?></td>
    </tr>
  </tbody>
  <tbody class="small">
    <tr>
      <td><strong>Total</strong> estimtated time</td>
      <td><?php echo $total_estimate ?></td>
    </tr>
  </tbody>
  <tbody class="small">
    <tr>
      <td>Issues without estimate</td>
      <td><?php echo $total_no_estimate ?></td>
    </tr>
  </tbody>
</table>

</div> <!-- /grid_12 -->


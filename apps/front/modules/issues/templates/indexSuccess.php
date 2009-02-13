<div class="grid_12">
<script type="text/javascript">
function toggleBatchActions()
{
  if ( $('input:checked.batch').length > 0 ) {
    $('#batch-actions :input').attr('disabled', false);
  } else {
    $('#batch-actions :input').attr('disabled', true);
  }
}
function checkAll(checkbox)
{
  var parent = $(checkbox).parents('table').get(0);
  $('input:checkbox', parent).attr('checked', checkbox.checked);
  toggleBatchActions();
}

$(document).ready(function(){
  $('input:checkbox.batch').change(function(){
    toggleBatchActions();
  });
  toggleBatchActions();
});
</script>

<h1>Issues List <small>(<a href="<?php echo url_for('issues_new') ?>">Create new issue</a>)</small></h1>

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
  $total_remaining = 0;
  $total_estimated = 0;
  $total_elapsed = 0;
  foreach ($pager->getResults() as $i => $issue) {
    if ($issue->curr_estimate) {
      $remaining = $issue->curr_estimate - $issue->elapsed;
      $remaining = $remaining < 0 ? 0 : $remaining;
      $total_remaining += $remaining;
      $total_estimated += $issue->curr_estimate;
      $total_elapsed += $issue->elapsed;
    } else {
      $remaining = '-';
      $total_no_estimate++;
    }

    if ($project_id !== $issue->project_id) {
      echo "</tbody></table>";
      $project_id = $issue->project_id;
      $close_table = true;
?>
<form action="<?php echo url_for('issues_batch') ?>" method="post">
<table class="issues list">
  <caption><?php echo $issue->Project ?></caption>
  <thead>
    <tr>
      <th><input type="checkbox" onclick="checkAll(this);" /></th>
      <th></th>
      <th>Issue</th>
      <th>Title</th>
      <th>Status</th>
      <th>Opened by</th>
      <th>Priority</th>
      <th title="Remaining hours">T</th>
    </tr>
  </thead>
  <tbody>
  <?php } ?>
    <tr class="<?php
        echo fmod($i,2) == 0 ? 'even' : 'odd';
        echo $issue['is_resolved'] ? ' resolved' : ' open';
      ?>">
      <td><div style="width:20px;"><input class="batch" type="checkbox" name="ids[]" value="<?php echo $issue['id'] ?>" /></div></td>
      <td><div style="width:30px;"><?php echo $issue['Category']['name'] ?></div></td>
      <td><div style="width:40px;"><?php echo link_to($issue['id'], 'issues_show', $issue) ?></div></td>
      <td><div style="width:450px;"><?php echo link_to($issue['title'], 'issues_show', $issue) ?></div></td>
      <td><div style="width:80px"><?php echo $issue['Status']['name'] ?></div></td>
      <td><div style="width:80px"><?php echo $issue['OpenedBy']['username'] ?></div></td>
      <td><div style="width:105px"><?php echo $issue['priority_id'] . ". " . $issue['Priority']['name'] ?></div></td>
      <td><div style="width:20px" title="Remaining hours"><?php echo $remaining ?></div></td>
    </tr>
<?php } ?>
  </tbody>
</table>

<div id="batch-actions">
  <input type="submit" value="<?php echo __('Edit') ?>" name="_edit" />
</div>
</form>

<?php include_partial('contacts/pager', array('pager' => $pager)) ?>

<strong><a href="<?php echo url_for('issues_new') ?>">Create new issue</a></strong>

<table class="small issue-stats">
  <thead><tr><th colspan="2">Stats for this page</th></thead>
  <tbody>
    <tr>
      <td>Estimated time remaining</td>
      <td><?php echo $total_remaining ?></td>
    </tr>
    <tr>
      <td>Elapsed time</td>
      <td><?php echo $total_elapsed ?></td>
    </tr>
  </tbody>
  <tbody class="small">
    <tr>
      <td>Total estimated time</td>
      <td><?php echo $total_estimated ?></td>
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


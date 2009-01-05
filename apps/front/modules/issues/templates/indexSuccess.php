<h1>Issues List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Project</th>
      <th>Component</th>
      <th>Assigned to</th>
      <th>Is open</th>
      <th>Opened at</th>
      <th>Opened by</th>
      <th>Resolved at</th>
      <th>Resolved by</th>
      <th>Closed at</th>
      <th>Closed by</th>
      <th>Status</th>
      <th>Category</th>
      <th>Priority</th>
      <th>Milestone</th>
      <th>Orig estimate</th>
      <th>Curr estimate</th>
      <th>Elapsed</th>
      <th>Deadline</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($issues as $issue): ?>
    <tr>
      <td><a href="<?php echo url_for('issues_show', $issue) ?>"><?php echo $issue->getid() ?></a></td>
      <td><?php echo $issue->gettitle() ?></td>
      <td><?php echo $issue->getproject_id() ?></td>
      <td><?php echo $issue->getcomponent_id() ?></td>
      <td><?php echo $issue->getassigned_to() ?></td>
      <td><?php echo $issue->getis_open() ?></td>
      <td><?php echo $issue->getopened_at() ?></td>
      <td><?php echo $issue->getopened_by() ?></td>
      <td><?php echo $issue->getresolved_at() ?></td>
      <td><?php echo $issue->getresolved_by() ?></td>
      <td><?php echo $issue->getclosed_at() ?></td>
      <td><?php echo $issue->getclosed_by() ?></td>
      <td><?php echo $issue->getstatus_id() ?></td>
      <td><?php echo $issue->getcategory_id() ?></td>
      <td><?php echo $issue->getpriority_id() ?></td>
      <td><?php echo $issue->getmilestone_id() ?></td>
      <td><?php echo $issue->getorig_estimate() ?></td>
      <td><?php echo $issue->getcurr_estimate() ?></td>
      <td><?php echo $issue->getelapsed() ?></td>
      <td><?php echo $issue->getdeadline() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('issues_new') ?>">New</a>

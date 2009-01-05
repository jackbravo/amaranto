<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $issue->getid() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $issue->gettitle() ?></td>
    </tr>
    <tr>
      <th>Project:</th>
      <td><?php echo $issue->getproject_id() ?></td>
    </tr>
    <tr>
      <th>Component:</th>
      <td><?php echo $issue->getcomponent_id() ?></td>
    </tr>
    <tr>
      <th>Assigned to:</th>
      <td><?php echo $issue->getassigned_to() ?></td>
    </tr>
    <tr>
      <th>Is open:</th>
      <td><?php echo $issue->getis_open() ?></td>
    </tr>
    <tr>
      <th>Opened at:</th>
      <td><?php echo $issue->getopened_at() ?></td>
    </tr>
    <tr>
      <th>Opened by:</th>
      <td><?php echo $issue->getopened_by() ?></td>
    </tr>
    <tr>
      <th>Resolved at:</th>
      <td><?php echo $issue->getresolved_at() ?></td>
    </tr>
    <tr>
      <th>Resolved by:</th>
      <td><?php echo $issue->getresolved_by() ?></td>
    </tr>
    <tr>
      <th>Closed at:</th>
      <td><?php echo $issue->getclosed_at() ?></td>
    </tr>
    <tr>
      <th>Closed by:</th>
      <td><?php echo $issue->getclosed_by() ?></td>
    </tr>
    <tr>
      <th>Status:</th>
      <td><?php echo $issue->getstatus_id() ?></td>
    </tr>
    <tr>
      <th>Category:</th>
      <td><?php echo $issue->getcategory_id() ?></td>
    </tr>
    <tr>
      <th>Priority:</th>
      <td><?php echo $issue->getpriority_id() ?></td>
    </tr>
    <tr>
      <th>Milestone:</th>
      <td><?php echo $issue->getmilestone_id() ?></td>
    </tr>
    <tr>
      <th>Orig estimate:</th>
      <td><?php echo $issue->getorig_estimate() ?></td>
    </tr>
    <tr>
      <th>Curr estimate:</th>
      <td><?php echo $issue->getcurr_estimate() ?></td>
    </tr>
    <tr>
      <th>Elapsed:</th>
      <td><?php echo $issue->getelapsed() ?></td>
    </tr>
    <tr>
      <th>Deadline:</th>
      <td><?php echo $issue->getdeadline() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('issues_edit', $issue) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('issues') ?>">List</a>

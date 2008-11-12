<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $project->getid() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $project->getname() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $project->getdescription() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $project->getcreated_at() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $project->getupdated_at() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('projects_edit', $project) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('projects') ?>">List</a>

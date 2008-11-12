<h1>Projects List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Description</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($project_list as $project): ?>
    <tr>
      <td><a href="<?php echo url_for('projects_show', $project) ?>"><?php echo $project->getid() ?></a></td>
      <td><?php echo $project->getname() ?></td>
      <td><?php echo $project->getdescription() ?></td>
      <td><?php echo $project->getcreated_at() ?></td>
      <td><?php echo $project->getupdated_at() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('projects_new') ?>">New</a>

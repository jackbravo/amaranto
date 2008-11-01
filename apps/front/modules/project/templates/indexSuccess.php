<h1>Project List</h1>

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
    <?php foreach ($projectList as $project): ?>
    <tr>
      <td><a href="<?php echo url_for('project/edit?id='.$project['id']) ?>"><?php echo $project['id'] ?></a></td>
      <td><?php echo $project['name'] ?></td>
      <td><?php echo $project['description'] ?></td>
      <td><?php echo $project['created_at'] ?></td>
      <td><?php echo $project['updated_at'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('project/create') ?>">Create</a>

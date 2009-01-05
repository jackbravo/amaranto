<h1>Milestones List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Project</th>
      <th>Date</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($milestone_list as $milestone): ?>
    <tr>
      <td><a href="<?php echo url_for('milestones/edit?id='.$milestone['id']) ?>"><?php echo $milestone->getid() ?></a></td>
      <td><?php echo $milestone->getname() ?></td>
      <td><?php echo $milestone->getproject_id() ?></td>
      <td><?php echo $milestone->getdate() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('milestones/new') ?>">New</a>

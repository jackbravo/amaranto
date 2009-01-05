<h1>Components List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Project</th>
      <th>Owner</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($component_list as $component): ?>
    <tr>
      <td><a href="<?php echo url_for('components/edit?id='.$component['id']) ?>"><?php echo $component->getid() ?></a></td>
      <td><?php echo $component->getname() ?></td>
      <td><?php echo $component->getproject_id() ?></td>
      <td><?php echo $component->getowner_id() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('components/new') ?>">New</a>

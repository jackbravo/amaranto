<h1>Person List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Code</th>
      <th>Type</th>
      <th>Company</th>
      <th>Title</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($personList as $person): ?>
    <tr>
      <td><a href="<?php echo url_for('person/show?id='.$person['id']) ?>"><?php echo $person['id'] ?></a></td>
      <td><?php echo $person['name'] ?></td>
      <td><?php echo $person['code'] ?></td>
      <td><?php echo $person['type'] ?></td>
      <td><?php echo $person['Company'] ?></td>
      <td><?php echo $person['title'] ?></td>
      <td><?php echo $person['created_at'] ?></td>
      <td><?php echo $person['updated_at'] ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('person/create') ?>">Create</a>

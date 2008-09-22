<h1>Person List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Code</th>
      <th>Type</th>
      <th>Company</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($personList as $person): ?>
    <tr>
      <td><a href="<?php echo url_for('person/edit?id='.$person->get('id')) ?>"><?php echo $person->getid() ?></a></td>
      <td><?php echo $person->getname() ?></td>
      <td><?php echo $person->getcode() ?></td>
      <td><?php echo $person->gettype() ?></td>
      <td><?php echo $person->getCompany() ?></td>
      <td><?php echo $person->getcreated_at() ?></td>
      <td><?php echo $person->getupdated_at() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('person/create') ?>">Create</a>

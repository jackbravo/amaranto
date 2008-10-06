<h1>Company List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Name</th>
      <th>Code</th>
      <th>Type</th>
      <th>Parent</th>
      <th>Title</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($companyList as $company): ?>
    <tr>
      <td><a href="<?php echo url_for('company/show?id='.$company->get('id')) ?>"><?php echo $company->getid() ?></a></td>
      <td><?php echo $company->getname() ?></td>
      <td><?php echo $company->getcode() ?></td>
      <td><?php echo $company->gettype() ?></td>
      <td><?php echo $company->getparent_id() ?></td>
      <td><?php echo $company->gettitle() ?></td>
      <td><?php echo $company->getcreated_at() ?></td>
      <td><?php echo $company->getupdated_at() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<a href="<?php echo url_for('company/create') ?>">Create</a>

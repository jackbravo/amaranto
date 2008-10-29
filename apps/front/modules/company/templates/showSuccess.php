<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $company->getid() ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $company->getname() ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $company->getcode() ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $company->gettype() ?></td>
    </tr>
    <tr>
      <th>Parent:</th>
      <td><?php echo $company->getparent_id() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $company->gettitle() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $company->getcreated_at() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $company->getupdated_at() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('company/edit?id='.$company->get('id')) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('parties/index') ?>">List</a>

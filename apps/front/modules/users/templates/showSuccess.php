<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $sf_guard_user->getid() ?></td>
    </tr>
    <tr>
      <th>Username:</th>
      <td><?php echo $sf_guard_user->getusername() ?></td>
    </tr>
    <tr>
      <th>Algorithm:</th>
      <td><?php echo $sf_guard_user->getalgorithm() ?></td>
    </tr>
    <tr>
      <th>Salt:</th>
      <td><?php echo $sf_guard_user->getsalt() ?></td>
    </tr>
    <tr>
      <th>Password:</th>
      <td><?php echo $sf_guard_user->getpassword() ?></td>
    </tr>
    <tr>
      <th>Is active:</th>
      <td><?php echo $sf_guard_user->getis_active() ?></td>
    </tr>
    <tr>
      <th>Is super admin:</th>
      <td><?php echo $sf_guard_user->getis_super_admin() ?></td>
    </tr>
    <tr>
      <th>Last login:</th>
      <td><?php echo $sf_guard_user->getlast_login() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $sf_guard_user->getcreated_at() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $sf_guard_user->getupdated_at() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('users_edit', $sf_guard_user) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('users') ?>">List</a>

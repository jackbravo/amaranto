<h1>Users List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Algorithm</th>
      <th>Salt</th>
      <th>Password</th>
      <th>Is active</th>
      <th>Is super admin</th>
      <th>Last login</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($sf_guard_user_list as $sf_guard_user): ?>
    <tr>
      <td><a href="<?php echo url_for('users_show', $sf_guard_user) ?>"><?php echo $sf_guard_user->getid() ?></a></td>
      <td><?php echo $sf_guard_user->getusername() ?></td>
      <td><?php echo $sf_guard_user->getalgorithm() ?></td>
      <td><?php echo $sf_guard_user->getsalt() ?></td>
      <td><?php echo $sf_guard_user->getpassword() ?></td>
      <td><?php echo $sf_guard_user->getis_active() ?></td>
      <td><?php echo $sf_guard_user->getis_super_admin() ?></td>
      <td><?php echo $sf_guard_user->getlast_login() ?></td>
      <td><?php echo $sf_guard_user->getcreated_at() ?></td>
      <td><?php echo $sf_guard_user->getupdated_at() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('users_new') ?>">New</a>

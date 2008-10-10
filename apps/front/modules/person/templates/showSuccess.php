<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $person['id'] ?></td>
    </tr>
    <tr>
      <th>Name:</th>
      <td><?php echo $person['name'] ?></td>
    </tr>
    <tr>
      <th>Code:</th>
      <td><?php echo $person['code'] ?></td>
    </tr>
    <tr>
      <th>Type:</th>
      <td><?php echo $person['type'] ?></td>
    </tr>
    <tr>
      <th>Company:</th>
      <td><?php echo $person['Company'] ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $person['title'] ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $person['created_at'] ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $person['updated_at'] ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('person/edit?id='.$person['id']) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('person/index') ?>">List</a>

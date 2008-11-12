<h1><?php echo $company['name'] ?></h1>

<h2>Teléfonos</h2>
<ul id="phones">
  <?php foreach ($company['Phonenumbers'] as $phone): ?>
    <li><?php echo $phone['number'] ?></li>
  <?php endforeach; ?>
</ul>

<h2>Emails</h2>
<ul id="emails">
  <?php foreach ($company['Emails'] as $email): ?>
    <li><?php echo $email['email'] ?></li>
  <?php endforeach; ?>
</ul>

<hr />

<a href="<?php echo url_for('@companies_edit?id='.$company['id']) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('parties/index') ?>">List</a>

<h1><?php echo $person['name'] ?></h1>

<p>
  <?php echo $person['title'] ?>
  <?php
    if ($person['Company']['id'])
    {
      echo ' at ';
      echo link_to($person['Company'],
        'company/show?id=' . $person['Company']['id']);
    }
  ?>
</p>

<h2>Teléfonos</h2>
<ul id="phones">
  <?php foreach ($person['Phonenumbers'] as $phone): ?>
    <li><?php echo $phone['number'] ?></li>
  <?php endforeach; ?>
</ul>

<h2>Emails</h2>
<ul id="emails">
  <?php foreach ($person['Emails'] as $email): ?>
    <li><?php echo $email['email'] ?></li>
  <?php endforeach; ?>
</ul>

<hr />

<a href="<?php echo url_for('person/edit?id='.$person['id']) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('parties/index') ?>">List</a>

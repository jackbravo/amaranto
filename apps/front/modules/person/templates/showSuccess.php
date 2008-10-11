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

<hr />

<a href="<?php echo url_for('person/edit?id='.$person['id']) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('person/index') ?>">List</a>

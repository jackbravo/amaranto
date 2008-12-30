<div id="content" class="grid_8">

  <div class="subheader">
    <?php echo link_to('Edit', 'people_edit', $person) ?>
  </div>

  <h1><?php echo $person['name'] ?></h1>

  <p>
    <?php echo $person['title'] ?>
    <?php
      if ($person['Company']['id'])
      {
        echo ' at ';
        echo link_to($person['Company'], 'companies_show', $person['Company']);
      }
    ?>
  </p>

  <hr />

</div> <!-- /grid_8 -->

<div class="sidebar grid_4">

  <div class="box">
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
  </div>

</div> <!-- /grid_4 -->

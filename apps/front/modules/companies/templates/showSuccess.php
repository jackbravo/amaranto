<?php use_helper('Text') ?>
<div id="content" class="grid_8">

  <div class="subheader">
    <?php echo link_to('Edit', 'companies_edit', $company) ?>
  </div>

  <h1><?php echo $company['name'] ?></h1>

  <hr />

  <?php include_partial('projects/show_notes', array('notes' => $company->getNotesList())) ?>

</div> <!-- /grid_8 -->

<div class="sidebar grid_4">

  <div class="box">
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
  </div>

</div> <!-- /grid_4 -->

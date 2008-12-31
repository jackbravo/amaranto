<?php use_helper('Text') ?>
<div id="content" class="grid_8">

  <div class="subheader">
    <?php if ($entity instanceof Person)
            echo link_to('Edit', 'people_edit', $entity);
          else if ($entity instanceof Company)
            echo link_to('Edit', 'companies_edit', $entity); ?>
  </div>

  <h1><?php echo $entity['name'] ?></h1>

  <p>
    <?php echo $entity['title'] ?>
    <?php
      if (isset($entity['Company']) && $entity['Company']['id'])
      {
        echo ' at ';
        echo link_to($entity['Company'], 'contacts_show', $entity['Company']);
      }
    ?>
  </p>

  <hr />

  <?php include_partial('notes/show_notes', array(
          'notes' => $entity->getNotesList(),
          'note_form' => $note_form,
        )) ?>

</div> <!-- /grid_8 -->

<div class="sidebar grid_4">

  <div class="box">
    <h2>Teléfonos</h2>
    <ul id="phones">
      <?php foreach ($entity['Phonenumbers'] as $phone): ?>
        <li><?php echo $phone['number'] ?></li>
      <?php endforeach; ?>
    </ul>

    <h2>Emails</h2>
    <ul id="emails">
      <?php foreach ($entity['Emails'] as $email): ?>
        <li><?php echo $email['email'] ?></li>
      <?php endforeach; ?>
    </ul>
  </div>

</div> <!-- /grid_4 -->

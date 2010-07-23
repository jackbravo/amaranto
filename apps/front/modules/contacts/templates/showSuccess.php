<?php include_once sfConfig::get('sf_lib_dir').'/vendor/Markdown/markdown.php' ?>
<?php $sf_response->setTitle((string) $entity) ?>
<div id="content" class="grid_8">

  <div class="subheader">
    <?php
      if ($entity->getRawValue() instanceof Person)
      {
        if ($sf_user->hasCredential('admin'))
        {
          if (!$entity->User->id)
          {
            echo link_to('Add user', '@users_new?person_id=' . $entity->id) . ' | ';
          }
          else
          {
            echo link_to('Edit user', '@users_edit?id=' . $entity->User->id . '&person_id=' . $entity->id) . ' | ';
          }
        }
        else if ($sf_user->getId() == $entity->User->id)
        {
            echo link_to('Change password', '@users_password?id=' . $entity->User->id . '&person_id=' . $entity->id) . ' | ';
        }
        echo link_to('Edit contact info', 'people_edit', $entity);
      }
      else if ($entity->getRawValue() instanceof Company)
      {
        echo link_to('Edit', 'companies_edit', $entity);
      }
    ?>
  </div>

  <h1><?php echo $entity['name'] ?></h1>

  <p>
    <?php if ($entity['Owner']['id']): ?>
      Owner, <strong><?php echo $entity['Owner'] ?></strong> | 
    <?php endif; ?>
    <?php echo $entity['title'] ?>
    <?php if ($entity->hasRelation('Company')): ?>
      at <?php echo link_to($entity['Company'], 'contacts_show', $entity['Company']); ?>
    <?php endif; ?>
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
        <li><?php echo $phone['number'] ?> <small><?php echo $phone->getTypeName() ?></small></li>
      <?php endforeach; ?>
    </ul>

    <h2>Emails</h2>
    <ul id="emails">
      <?php foreach ($entity['Emails'] as $email): ?>
        <li><?php echo $email['email'] ?> <small><?php echo $email->getTypeName() ?></small></li>
      <?php endforeach; ?>
    </ul>

    <h2>Addresses</h2>
    <ul id="addresses">
      <?php foreach ($entity['Locations'] as $loc): ?>
        <li>
          <?php
            if ($loc['street']) echo nl2br($loc['street']) . '<br>';
            if ($loc['city']) echo $loc['city'];
            if ($loc['state']) echo ', ' . $loc['state'];
            if ($loc['postal_code']) echo ' ' . $loc['postal_code'];
            if ($loc['country']) echo '<br>' . $loc['country'];
          ?>
          <small><?php echo $loc->getTypeName() ?></small>
        </li>
      <?php endforeach; ?>
    </ul>

    <h2>Notes</h2>
    <?php echo Markdown($entity['description']) ?>
  </div>

  <?php if ($entity->hasRelation('People')): ?>
    <div class="box">
      <h2>People</h2>
      <ul id="people">
        <?php foreach ($entity['People'] as $person): ?>
          <li><?php echo link_to($person, 'contacts_show', $person) ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
  <?php endif; ?>

</div> <!-- /grid_4 -->

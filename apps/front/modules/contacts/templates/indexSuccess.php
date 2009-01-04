<div class="grid_8">

<h1>Contacts</h1>

<div class="tabs">
  <?php
    $links = array(
      'people' => '@contacts?show=people',
      'companies' => '@contacts?show=companies',
    );

    foreach ($links as $name => $route)
    {
      $current = $sf_request->getParameter('show', 'people');
      $class = $current == $name ? 'active' : '';
      echo '&nbsp' . link_to(__($name), $route, array('class' => $class));
    }
  ?>
</div>

<table class="contacts list">
  <tbody>
    <?php foreach ($pager->getResults() as $entity): ?>
    <tr class="contact">
      <td class="info">
        <h2><a href="<?php echo url_for('@contacts_show?id='.$entity['id']) ?>"><?php echo $entity['name'] ?></a></h2>
        <a href="<?php echo url_for('@contacts?title='.$entity['title']) ?>"><?php echo $entity['title'] ?></a>
        <?php if (isset($entity['Company']) && $entity['Company']['id']): ?>
          at <a href="<?php echo url_for('@contacts_show?id='.$entity['Company']['id']) ?>"><?php echo $entity['Company'] ?></a>
        <?php endif; ?>
      </td>
      <td class="contact">
        <?php if ($entity['Phonenumbers'][0]['id']) echo $entity['Phonenumbers'][0] ?><br/>
        <?php if ($entity['Emails'][0]['id']) echo $entity['Emails'][0] ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include_partial('contacts/pager', array('pager' => $pager)) ?>

</div>

<div class="grid_4">
  <div class="box">
    <p><a href="<?php echo url_for('@people_new') ?>">Add a new person</a></p>
    <p><a href="<?php echo url_for('@companies_new') ?>">Add a new company</a></p>
  </div>
</div>

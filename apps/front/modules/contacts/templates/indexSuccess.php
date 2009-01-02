<div class="grid_8">

<h1>Contacts</h1>

<div class="tabs">
  <?php echo link_to('People', '@contacts?show=people', array('class' => 'active')) ?>
  <?php echo link_to('Companies', '@contacts?show=companies') ?>
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

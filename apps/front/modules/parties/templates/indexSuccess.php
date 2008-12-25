<div class="grid_8">

<h1>Contacts</h1>

<div class="tabs">
  <?php echo link_to('People', 'parties/index?show=people', array('class' => 'active')) ?>
  <?php echo link_to('Companies', 'parties/index?show=companies') ?>
</div>

<table class="list">
  <tbody>
    <?php foreach ($pager->getResults() as $entity): ?>
    <tr>
      <td class="info">
        <?php if ($show == 'people'): ?>
          <h2><a href="<?php echo url_for('@people_show?id='.$entity['id']) ?>"><?php echo $entity['name'] ?></a></h2>
        <?php else: ?>
          <h2><a href="<?php echo url_for('@companies_show?id='.$entity['id']) ?>"><?php echo $entity['name'] ?></a></h2>
        <?php endif; ?>
        <a href="<?php echo url_for('parties/index?title='.$entity['title']) ?>"><?php echo $entity['title'] ?></a>
        <?php if ($show == 'people' && $entity['Company']['id']): ?>
          at <a href="<?php echo url_for('@companies_show?id='.$entity['Company']['id']) ?>"><?php echo $entity['Company'] ?></a>
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

<?php include_partial('parties/pager', array('pager' => $pager, 'url' => url_for('parties/index'))) ?>

</div>

<div class="grid_4">
  <div class="box">
    <p><a href="<?php echo url_for('@people_new') ?>">Add a new person</a></p>
    <p><a href="<?php echo url_for('@companies_new') ?>">Add a new company</a></p>
  </div>
</div>

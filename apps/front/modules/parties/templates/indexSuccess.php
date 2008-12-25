<div class="grid_8">

<h1>Contacts</h1>

<div class="tabs">
  <?php echo link_to('People', 'parties/index?show=people', array('class' => 'active')) ?>
  <?php echo link_to('Companies', 'parties/index?show=companies') ?>
</div>

<table class="list">
  <tbody>
    <?php foreach ($personList as $person): ?>
    <tr>
      <td class="info">
        <?php if ($show == 'people'): ?>
          <h2><a href="<?php echo url_for('@people_show?id='.$person['id']) ?>"><?php echo $person['name'] ?></a></h2>
        <?php else: ?>
          <h2><a href="<?php echo url_for('@companies_show?id='.$person['id']) ?>"><?php echo $person['name'] ?></a></h2>
        <?php endif; ?>
        <a href="<?php echo url_for('parties/index?title='.$person['title']) ?>"><?php echo $person['title'] ?></a>
        <?php if ($show == 'people' && $person['Company']['id']): ?>
          at <a href="<?php echo url_for('@companies_show?id='.$person['Company']['id']) ?>"><?php echo $person['Company'] ?></a>
        <?php endif; ?>
      </td>
      <td class="contact">
        <?php if ($person['Phonenumbers'][0]['id']) echo $person['Phonenumbers'][0] ?><br/>
        <?php if ($person['Emails'][0]['id']) echo $person['Emails'][0] ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</div>

<div class="grid_4">
  <div class="box">
    <p><a href="<?php echo url_for('@people_new') ?>">Add a new person</a></p>
    <p><a href="<?php echo url_for('@companies_new') ?>">Add a new company</a></p>
  </div>
</div>

<h1>Person List</h1>

<div class="tabs">
  <?php echo link_to('People', 'parties/index?show=people', array('class' => 'active')) ?>
  <?php echo link_to('Companies', 'parties/index?show=companies') ?>
</div>

<table class="list">
  <tbody>
    <?php foreach ($personList as $person): ?>
    <tr>
      <td class="info">
        <h2><a href="<?php echo url_for('person/show?id='.$person['id']) ?>"><?php echo $person['name'] ?></a></h2>
        <a href="<?php echo url_for('person/index?title='.$person['title']) ?>"><?php echo $person['title'] ?></a>
        <?php if ($show == 'people' && $person['Company']['id']): ?>
          at <a href="<?php echo url_for('company/show?id='.$person['Company']['id']) ?>"><?php echo $person['Company'] ?></a>
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

<?php slot('sidebar-right') ?>
<div class="box">
  <p><a href="<?php echo url_for('person/create') ?>">Add a new person</a></p>
  <p><a href="<?php echo url_for('company/create') ?>">Add a new company</a></p>
</div>
<?php end_slot() ?>

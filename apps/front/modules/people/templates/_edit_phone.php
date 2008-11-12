<div id="phones" class="form-item repeat-form">
<label>
  Phone numbers
  <?php echo link_to_function(image_tag('/sf/sf_admin/images/add.png'),
          "addField('phones')",
          array('title' => __('add'))) ?>
</label>
<?php foreach ($form['Phonenumbers'] as $field): ?>
  <div class="item-row">
    <?php echo $field['number'] . $field['type'] ?>
    <?php echo link_to_function(image_tag('/sf/sf_admin/images/delete.png'),
            "removeField(this)",
            array('title' => __('remove'))) ?>
  </div>
<?php endforeach; ?>
</div>

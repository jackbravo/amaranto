<div id="locations" class="form-item repeat-form">
<label>
  Addresses
  <?php echo link_to_function(image_tag('/sf/sf_admin/images/add.png'),
          "addField('locations')",
          array('title' => __('add'))) ?>
</label>
<?php foreach ($form['Locations'] as $field): ?>
  <div class="item-row">
    <div><?php echo $field['street'] . $field['type'] ?>
    <?php echo link_to_function(image_tag('/sf/sf_admin/images/delete.png'),
            "removeField(this)",
            array('title' => __('remove'))) ?></div>
    <div><?php echo $field['city'] ?></div>
    <div><?php echo $field['state'] ?></div>
    <div><?php echo $field['postal_code'] ?></div>
    <div><?php echo $field['country'] ?></div>
  </div>
<?php endforeach; ?>
</div>

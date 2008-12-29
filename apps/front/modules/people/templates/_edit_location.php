<div id="locations" class="form-item repeat-form">
<label>
  Addresses
  <?php echo link_to_function(image_tag('/sf/sf_admin/images/add.png'),
          "addField('locations')",
          array('title' => __('add'))) ?>
</label>
<?php foreach ($form['Locations'] as $field): ?>
  <div class="item-row">
    <div>
      <?php echo $field['street'] . '&nbsp;' . $field['type'] ?>
      <?php echo link_to_function(image_tag('/sf/sf_admin/images/delete.png'),
              "removeField(this)",
              array('title' => __('remove')))
      ?>
      <div class="description">
        <?php echo $field['street']->renderLabel() ?>
        <div class="errors">
          <?php echo $field['street']->renderError() ?>
          <?php echo $field['type']->renderError() ?>
        </div>
      </div>
    </div>
    <div><?php echo $field['city']->renderRow() ?></div>
    <div><?php echo $field['state']->renderRow() ?></div>
    <div><?php echo $field['postal_code']->renderRow() ?></div>
    <div><?php echo $field['country']->renderRow() ?></div>
  </div>
<?php endforeach; ?>
</div>

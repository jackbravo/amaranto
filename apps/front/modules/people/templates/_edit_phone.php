<div id="phones" class="form-item repeat-form">
<label>
  Phone numbers
  <?php echo link_to_function(image_tag('/sf/sf_admin/images/add.png'),
          "addField('phones')",
          array('title' => __('add'))) ?>
</label>
<?php foreach ($form['Phonenumbers'] as $field): ?>
  <div class="item-row">
    <div class="fields">
      <?php echo $field['number'] . $field['type'] ?>
      <?php echo link_to_function(image_tag('/sf/sf_admin/images/delete.png'),
              "removeField(this)",
              array('title' => __('remove')))
      ?>
    </div>
    <div class="description">
      <div class="errors">
        <?php echo $field['number']->renderError() ?>
        <?php echo $field['type']->renderError() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>

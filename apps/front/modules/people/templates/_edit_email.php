<div id="emails" class="form-item repeat-form">
<label>
  Emails
  <?php echo link_to_function(image_tag('/sf/sf_admin/images/add.png'),
          "addField('emails')",
          array('title' => __('add'))) ?>
</label>
<?php foreach ($form['Emails'] as $field): ?>
  <div class="item-row">
    <div class="fields">
      <?php echo $field['email'] . $field['type'] ?>
      <?php echo link_to_function(image_tag('/sf/sf_admin/images/delete.png'),
              "removeField(this)",
              array('title' => __('remove')))
      ?>
    </div>
    <div class="description">
      <div class="errors">
        <?php echo $field['email']->renderError() ?>
        <?php echo $field['type']->renderError() ?>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>


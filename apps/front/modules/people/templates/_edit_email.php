<div id="emails" class="form-item repeat-form">
<label>
  Emails
  <?php echo link_to_function(image_tag('/sf/sf_admin/images/add.png'),
          "addField('emails')",
          array('title' => __('add'))) ?>
</label>
<?php foreach ($form['Emails'] as $field): ?>
  <div class="item-row">
    <?php echo $field['email'] . $field['type'] ?>
    <?php echo link_to_function(image_tag('/sf/sf_admin/images/delete.png'),
            "removeField(this)",
            array('title' => __('remove'))) ?>
  </div>
<?php endforeach; ?>
</div>


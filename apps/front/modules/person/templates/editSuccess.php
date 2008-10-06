<?php use_javascript('form/add_remove_field.js') ?>
<?php use_helper('JavascriptBase') ?>
<?php $person = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Person</h1>

<?php echo $form->renderFormTag(url_for('person/update')) ?>
<?php echo $form->renderHiddenFields(); ?>
<?php echo $form['name']->renderRow(); ?>
<?php echo $form['title']->renderRow(); ?>
<?php echo $form['parent_id']->renderRow(); ?>

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

    <tfoot>
      <tr>
        <td colspan="2">
          &nbsp;<a href="<?php echo url_for('person/index') ?>">Cancel</a>
          <?php if (!$form->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'person/delete?id='.$person->get('id'), array('post' => true, 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
</form>

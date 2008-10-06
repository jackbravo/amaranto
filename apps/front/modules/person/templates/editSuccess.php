<?php use_javascript('form/add_remove_field.js') ?>
<?php use_helper('JavascriptBase') ?>
<?php $person = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Person</h1>

<?php echo $form->renderFormTag(url_for('person/update')) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<?php echo $form['name']->renderRow() ?>
<?php echo $form['title']->renderRow() ?>
<?php echo $form['parent_id']->renderRow() ?>

<?php include_partial('edit_email', array('form' => $form)) ?>

<?php include_partial('edit_phone', array('form' => $form)) ?>

<?php include_partial('edit_location', array('form' => $form)) ?>

<div>
  &nbsp;<a href="<?php echo url_for('person/index') ?>">Cancel</a>
  <?php if (!$form->isNew()): ?>
    &nbsp;<?php echo link_to('Delete', 'person/delete?id='.$person->get('id'), array('post' => true, 'confirm' => 'Are you sure?')) ?>
  <?php endif; ?>
  <input type="submit" value="Save" />
</div>

</form>

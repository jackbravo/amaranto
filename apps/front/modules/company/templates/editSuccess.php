<?php use_javascript('form/add_remove_field.js') ?>
<?php use_helper('JavascriptBase') ?>
<?php $company = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Company</h1>

<?php echo $form->renderFormTag(url_for('company/update')) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<?php echo $form['name']->renderRow() ?>

<?php include_partial('person/edit_email', array('form' => $form)) ?>

<?php include_partial('person/edit_phone', array('form' => $form)) ?>

<?php include_partial('person/edit_location', array('form' => $form)) ?>

<div>
  &nbsp;<a href="<?php echo url_for('company/index') ?>">Cancel</a>
  <?php if (!$form->isNew()): ?>
    &nbsp;<?php echo link_to('Delete', 'company/delete?id='.$company->get('id'), array('post' => true, 'confirm' => 'Are you sure?')) ?>
  <?php endif; ?>
  <input type="submit" value="Save" />
</div>

</form>

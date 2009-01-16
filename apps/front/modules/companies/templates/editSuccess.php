<?php use_javascript('form/add_remove_field.js') ?>
<?php use_helper('JavascriptBase') ?>
<?php $company = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Company</h1>

<?php echo form_tag_for($form, '@companies') ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<?php echo $form['name']->renderRow() ?>
<?php echo $form['owner_id']->renderRow() ?>

<?php include_partial('people/edit_email', array('form' => $form)) ?>

<?php include_partial('people/edit_phone', array('form' => $form)) ?>

<?php include_partial('people/edit_location', array('form' => $form)) ?>

<?php echo $form['description']->renderRow() ?>

<div>
  <input type="submit" value="Save" />
  <?php if (!$form->isNew()): ?>
    &nbsp;<?php echo link_to('Cancel', '@contacts_show?id='.$company->get('id')) ?>
    &nbsp;<?php echo link_to('Delete', '@companies_delete?id='.$company->get('id'), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
  <?php else: ?>
    &nbsp;<a href="<?php echo url_for('@contacts') ?>">Cancel</a>
  <?php endif; ?>
</div>

</form>

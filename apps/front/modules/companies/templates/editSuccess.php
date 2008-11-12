<?php use_javascript('form/add_remove_field.js') ?>
<?php use_helper('JavascriptBase') ?>
<?php $company = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Company</h1>

<?php echo form_tag_for($form, '@companies') ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<?php echo $form['name']->renderRow() ?>

<?php include_partial('people/edit_email', array('form' => $form)) ?>

<?php include_partial('people/edit_phone', array('form' => $form)) ?>

<?php include_partial('people/edit_location', array('form' => $form)) ?>

<div>
  <?php if (!$form->isNew()): ?>
    &nbsp;<a href="<?php echo url_for('@companies_show?id='.$company->get('id')) ?>">Cancel</a>
    &nbsp;<?php echo link_to('Delete', '@companies_delete?id='.$company->get('id'), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
  <?php else: ?>
    &nbsp;<a href="<?php echo url_for('parties/index') ?>">Cancel</a>
  <?php endif; ?>
  <input type="submit" value="Save" />
</div>

</form>

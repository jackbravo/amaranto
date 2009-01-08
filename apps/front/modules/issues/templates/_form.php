<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@issues') ?>

  <?php echo $form ?>

  &nbsp;<a href="<?php echo url_for('issues') ?>">Cancel</a>
  <?php if (!$form->getObject()->isNew()): ?>
    &nbsp;<?php echo link_to('Delete', 'issues_delete', $form->getObject(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
  <?php endif; ?>
  <input type="submit" value="Save" />

</form>

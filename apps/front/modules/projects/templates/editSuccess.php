<h1>Edit Projects</h1>

<?php echo form_tag_for($form, '@projects') ?>
<?php include_partial('form', array('form' => $form)) ?>

<div>
  <input type="submit" value="Save" />
  &nbsp;<?php echo link_to('Cancel', '@projects') ?>
  &nbsp;<?php echo link_to('Delete', 'projects_delete', $form->getObject(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
</div>

</form>


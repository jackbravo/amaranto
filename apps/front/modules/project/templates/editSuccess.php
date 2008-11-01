<?php $project = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Project</h1>

<?php echo $form->renderFormTag(url_for('project/update')) ?>

<?php echo $form ?>

<div>
  &nbsp;<a href="<?php echo url_for('project/index') ?>">Cancel</a>
  <?php if (!$form->isNew()): ?>
    &nbsp;<?php echo link_to('Delete', 'project/delete?id='.$project['id'], array('post' => true, 'confirm' => 'Are you sure?')) ?>
  <?php endif; ?>
  <input type="submit" value="Save" />
</div>
</form>

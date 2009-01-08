<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@issues') ?>

  <?php echo $form->renderGlobalErrors() ?>
  <?php echo $form->renderHiddenFields() ?>

  <div class="fullspan clearfix">
    <div class="grid_6"><?php echo $form['title']->renderRow() ?></div>
    <div class="grid_3"><?php echo $form['project_id']->renderRow() ?></div>
    <div class="grid_3"><?php echo $form['component_id']->renderRow() ?></div>
  </div>

  <div class="fullspan clearfix">
    <div class="grid_6"><?php echo $form['assigned_to']->renderRow() ?></div>
    <div class="grid_3"><?php echo $form['priority_id']->renderRow() ?></div>
    <div class="grid_3"><?php echo $form['milestone_id']->renderRow() ?></div>
  </div>

  <div class="fullspan clearfix">
    <div class="grid_6"><?php echo $form['Activities'][0]['body']->renderRow() ?></div>
    <div class="grid_6">
      <?php echo $form['category_id']->renderRow() ?>
      <?php echo $form['status_id']->renderRow() ?>
      <?php echo $form['curr_estimate']->renderRow() ?>
      <?php echo $form['elapsed']->renderRow() ?>
      <?php echo $form['deadline']->renderRow() ?>
    </div>
  </div>

  <br/>
  <div class="grid_12">
    &nbsp;<a href="<?php echo url_for('issues') ?>">Cancel</a>
    <?php if (!$form->getObject()->isNew()): ?>
      &nbsp;<?php echo link_to('Delete', 'issues_delete', $form->getObject(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
    <?php endif; ?>
    <input type="submit" value="Save" />
  </div>

</form>

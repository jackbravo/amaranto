<?php use_helper('Text') ?>
<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#issue_status_id').change(function() {
      if (this.value > 1) $('#save_and_close').fadeIn();
      else $('#save_and_close').hide();
    });
    $('#issue_status_id').change();
  });
</script>

<?php echo form_tag_for($form, '@issues') ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<div class="grid_8">
  <?php echo $form['assigned_to']->renderRow() ?>
  <?php echo $form['priority_id']->renderRow() ?>

  <?php echo $form['Activity']['body']->renderRow() ?>

  <?php if (!$form->getObject()->isNew()): ?>
    <hr />
    <?php include_partial('activities', array('activities' => $form->getObject()->Activities)) ?>
  <?php endif; ?>
  <hr />

  <div class="item-row">
    <input type="submit" value="Save" />
    <?php if ($form->getObject()->isNew()): ?>
      &nbsp;<input type="submit" value="Save and add" name="_save_and_add" />
      &nbsp;<?php echo link_to('Cancel', 'issues') ?>
    <?php else: ?>
      <?php if (!$form->getObject()->isClosed()
                && ($sf_user->getId() == $form->getObject()->opened_by
                    || $sf_user->hasCredential('admin'))): ?>
        &nbsp;<input id="save_and_close" type="submit" value="Save and close" name="_save_and_close" />
      <?php endif; ?>
      &nbsp;<?php echo link_to('Cancel', 'issues_show', $form->getObject()) ?>
      &nbsp;<?php echo link_to('Delete', 'issues_delete', $form->getObject(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
    <?php endif; ?>
  </div>
</div> <!-- /grid_8 -->

<div class="grid_4">
  <div class="issue-id-box">
    <h1 class="issue-id">
      <?php if ($form->getObject()->exists()): ?>
        <?php echo link_to($form->getObject()->id, 'issues_show', $form->getObject()) ?>
      <?php else: ?>
        <a>_</a>
      <?php endif; ?>
    </h1>
    <?php echo $form['status_id']->renderRow() ?>
    <?php echo $form['category_id']->renderRow() ?>
  </div>

  <div class="issue-location">
    <?php echo $form['project_id']->renderRow() ?>
    <?php echo $form['component_id']->renderRow() ?>
    <?php echo $form['milestone_id']->renderRow() ?>
  </div>

  <div class="issue-estimate">
    <?php echo $form['curr_estimate']->renderRow() ?>
    <?php echo $form['elapsed']->renderRow() ?>
  </div>

  <br/>
  <?php echo $form['deadline']->renderRow() ?>
</div> <!-- /grid_4 -->

</form>


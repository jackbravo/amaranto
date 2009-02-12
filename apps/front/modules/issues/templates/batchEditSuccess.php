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

<form action="<?php echo url_for('@issues_batchUpdate') ?>" method="post">

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<div class="grid_8">
  <p>
  <strong>Bulk edit</strong><br/>
  <?php foreach ($issues as $issue): ?>
    <?php echo link_to($issue->id, 'issues_show', $issue) . ' ' . $issue ?><br/>
    <input type="hidden" name="ids[]" value="<?php echo $issue->id ?>" />
  <?php endforeach; ?>
  </p>

  <?php echo $form['assigned_to']->renderRow() ?>
  <?php echo $form['priority_id']->renderRow() ?>

  <?php echo $form['body']->renderRow() ?>

  <?php if (!$form->getObject()->isNew()): ?>
    <hr />
    <?php include_partial('activities', array('activities' => $form->getObject()->Activities)) ?>
  <?php endif; ?>
  <hr />

  <div class="item-row">
    <input type="submit" value="Save" name="_save_batch" />
    &nbsp;<?php echo link_to('Cancel', 'issues') ?>
  </div>
</div> <!-- /grid_8 -->

<div class="grid_4">
  <div class="issue-id-box">
    <h1 class="issue-id">
      <a>*</a>
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


<?php use_javascript('form/add_remove_field.js') ?>
<?php use_javascript('ui/ui.core.js') ?>
<?php use_javascript('ui/ui.autocomplete.js') ?>
<?php use_stylesheet('jquery-ui-south.css') ?>
<?php use_helper('JavascriptBase') ?>
<?php $person = $form->getObject() ?>

<div class="grid_12">

<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Person</h1>

<?php echo form_tag_for($form, '@people') ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<?php echo $form['name']->renderRow() ?>
<?php echo $form['title']->renderRow() ?>
<?php echo $form['company']->renderRow() ?>
<script type="text/javascript">
  $("#person_company").autocomplete({
    url: "<?php echo url_for("companies/ajaxList") ?>",
    dataType: "json",
    parse:    function(data) {
      var parsed = [];
      for (key in data) {
        parsed[parsed.length] = { data: [ data[key], key ], value: data[key], result: data[key] };
      }
      return parsed;
    }
  });
</script>
<?php echo $form['owner_id']->renderRow() ?>

<?php include_partial('edit_email', array('form' => $form)) ?>

<?php include_partial('edit_phone', array('form' => $form)) ?>

<?php include_partial('edit_location', array('form' => $form)) ?>

<?php echo $form['description']->renderRow() ?>

<div>
  <input type="submit" value="Save" />
  <?php if (!$form->isNew()): ?>
    &nbsp;<?php echo link_to('Cancel', '@contacts_show?id='.$person->get('id')) ?>
    &nbsp;<?php echo link_to('Delete', '@people_delete?id='.$person->get('id'), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
  <?php else: ?>
    &nbsp;<a href="<?php echo url_for('@contacts') ?>">Cancel</a>
  <?php endif; ?>
</div>

</form>

</div> <!-- /grid_12 -->

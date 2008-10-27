<?php use_javascript('form/add_remove_field.js') ?>
<?php use_javascript('ui/ui.core.js') ?>
<?php use_javascript('ui/ui.autocomplete.js') ?>
<?php use_stylesheet('jquery-ui-south.css') ?>
<?php use_helper('JavascriptBase') ?>
<?php $person = $form->getObject() ?>
<h1><?php echo $form->isNew() ? 'New' : 'Edit' ?> Person</h1>

<?php echo $form->renderFormTag(url_for('person/update')) ?>

<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<?php echo $form['name']->renderRow() ?>
<?php echo $form['title']->renderRow() ?>
<?php echo $form['company']->renderRow() ?>
<script type="text/javascript">
  $("#person_company").autocomplete({
    url: "<?php echo url_for("company/ajaxList") ?>",
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

<?php include_partial('edit_email', array('form' => $form)) ?>

<?php include_partial('edit_phone', array('form' => $form)) ?>

<?php include_partial('edit_location', array('form' => $form)) ?>

<div>
  &nbsp;<a href="<?php echo url_for('person/index') ?>">Cancel</a>
  <?php if (!$form->isNew()): ?>
    &nbsp;<?php echo link_to('Delete', 'person/delete?id='.$person->get('id'), array('post' => true, 'confirm' => 'Are you sure?')) ?>
  <?php endif; ?>
  <input type="submit" value="Save" />
</div>

</form>

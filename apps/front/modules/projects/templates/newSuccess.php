<?php use_javascript('ui/ui.core.js') ?>
<?php use_javascript('ui/ui.autocomplete.js') ?>
<?php use_stylesheet('jquery-ui-south.css') ?>
<h1>New Projects</h1>

<?php echo form_tag_for($form, '@projects') ?>
<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<?php echo $form['name']->renderRow() ?>
<?php echo $form['client']->renderRow() ?>
<script type="text/javascript">
  $("#project_client").autocomplete({
    url: "<?php echo url_for("@contacts_ajax") ?>",
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
<?php echo $form['description']->renderRow() ?>

<div>
  &nbsp;<a href="<?php echo url_for('@projects') ?>">Cancel</a>
  <input type="submit" value="Save" />
</div>

</form>

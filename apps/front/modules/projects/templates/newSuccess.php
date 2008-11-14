<h1>New Projects</h1>

<?php echo form_tag_for($form, '@projects') ?>
<?php echo $form->renderGlobalErrors() ?>
<?php echo $form->renderHiddenFields() ?>

<?php echo $form['name']->renderRow() ?>
<?php echo $form['description']->renderRow() ?>

<div>
  &nbsp;<a href="<?php echo url_for('@projects') ?>">Cancel</a>
  <input type="submit" value="Save" />
</div>

</form>

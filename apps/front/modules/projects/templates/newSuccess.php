<h1>New Project</h1>

<?php echo form_tag_for($form, '@projects') ?>
<?php include_partial('form', array('form' => $form)) ?>

<div>
  <input type="submit" value="Save" />
  &nbsp;<?php echo link_to('Cancel', '@projects') ?>
</div>

</form>


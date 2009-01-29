<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<?php echo form_tag_for($form, '@users') ?>

  <?php echo $form ?>

  <div class="actions">
    <input type="submit" value="Save" />
    &nbsp;<?php echo link_to('Cancel', '@contacts_show?id=' . $sf_request->getParameter('person_id')) ?>
  </div>
</form>

<?php include_once sfConfig::get('sf_lib_dir').'/vendor/Markdown/markdown.php' ?>
<div class="note-form">
  <?php echo form_tag_for($note_form, '@notes') ?>
  <?php echo $note_form->renderGlobalErrors() ?>
  <?php echo $note_form->renderHiddenFields() ?>
  <?php echo $note_form ?>
  <input type="submit" value="Save" />
</div>

<div class="notes">
<?php foreach ($notes as $note): ?>
  <div class="note">
    <p><strong><?php echo $note['CreatedBy'] ? $note['CreatedBy'] : 'Anonymus' ?></strong> on <?php echo $note['created_at'] ?></p>
    <?php echo Markdown($note['body']) ?>
  </div>
<?php endforeach; ?>
</div>

<div class="note-form">
  <?php $note_form = new NoteForm() ?>
  <?php echo $note_form->renderGlobalErrors() ?>
  <?php echo $note_form->renderHiddenFields() ?>
  <?php echo $note_form ?>
  <input type="submit" value="Save" />
</div>

<div class="notes">
<?php foreach ($notes as $note): ?>
  <div class="note">
    <p><strong><?php echo $note['CreatedBy'] ? $note['CreatedBy'] : 'Anonymus' ?></strong> on <?php echo $note['created_at'] ?></p>
    <?php echo simple_format_text($note['body']) ?>
  </div>
<?php endforeach; ?>
</div>

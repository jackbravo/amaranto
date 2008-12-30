<?php foreach ($notes as $note): ?>
  <div class="note">
    <p><strong><?php echo $note['CreatedBy'] ?></strong> on <?php echo $note['created_at'] ?></p>
    <?php echo simple_format_text($note['body']) ?>
  </div>
<?php endforeach; ?>

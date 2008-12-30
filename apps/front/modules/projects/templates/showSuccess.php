<?php use_helper('Text') ?>
<div id="content" class="grid_8">

  <div class="subheader">
    <?php echo link_to('Edit', 'projects_edit', $project) ?>
  </div>

  <h1><?php echo $project['name'] ?></h1>
  <?php if ($project['Entity']['id']): ?>
    <p>for <a href="<?php echo $project['Entity']->getShowUrl() ?>"><?php echo $project['Entity'] ?></a></p>
  <?php endif; ?>

  <?php echo simple_format_text($project['description']) ?>

  <hr />

  <?php foreach ($project['Notes'] as $note): ?>
    <div class="note">
      <p><strong><?php echo $note['CreatedBy'] ?></strong> on <?php echo $note['created_at'] ?></p>
      <?php echo simple_format_text($note['body']) ?>
    </div>
  <?php endforeach; ?>

</div> <!-- /grid_8 -->

<div class="sidebar grid_4">

</div> <!-- /grid_4 -->


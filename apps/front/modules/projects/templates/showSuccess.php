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

  <?php include_partial('projects/show_notes', array('notes' => $project->getNotesList())) ?>

</div> <!-- /grid_8 -->

<div class="sidebar grid_4">

</div> <!-- /grid_4 -->


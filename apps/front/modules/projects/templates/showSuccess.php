<?php use_helper('Text') ?>
<div id="content" class="grid_8">

  <div class="subheader">
    <?php echo link_to('Edit', 'projects_edit', $project) ?>
  </div>

  <h1><?php echo $project['name'] ?></h1>
  <?php if ($project['Entity']['id']): ?>
    <p>for <?php echo link_to($project['Entity'], 'contacts_show', $project['Entity']) ?></p>
  <?php endif; ?>

  <?php echo simple_format_text($project['description']) ?>

  <hr />

  <?php include_partial('notes/show_notes', array(
          'notes' => $project->getNotesList(),
          'note_form' => $note_form,
        )) ?>

</div> <!-- /grid_8 -->

<div class="sidebar grid_4">

</div> <!-- /grid_4 -->


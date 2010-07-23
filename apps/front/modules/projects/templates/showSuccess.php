<?php include_once sfConfig::get('sf_lib_dir').'/vendor/Markdown/markdown.php' ?>
<?php $sf_response->setTitle((string) $project) ?>
<div id="content" class="grid_8">

  <div class="subheader">
    <?php echo link_to('Edit', 'projects_edit', $project) ?>
  </div>

  <h1><?php echo $project['name'] ?></h1>
  <p>
  <?php if ($project['Owner']['id']): ?>
    Owner, <strong><?php echo $project['Owner'] ?></strong>
  <?php endif; ?>
  </p>

  <?php echo Markdown($project['description']) ?>

  <hr />

  <?php include_partial('notes/show_notes', array(
          'notes' => $project->getNotesList(),
          'note_form' => $note_form,
        )) ?>

</div> <!-- /grid_8 -->

<div class="sidebar grid_4">

  <div class="milestones box">
    <h2>
      Milestones
      <small><?php echo link_to('new', '@milestones_new?project_id=' . $project['id']) ?></small>
    </h2>
    <?php foreach ($project->getMilestonesList() as $milestone): ?>
      <div class="milestone">
        <?php echo link_to($milestone, 'milestones_edit', $milestone) ?>
        - <?php echo $milestone['date'] ?></div>
    <?php endforeach; ?>
  </div>

  <div class="components box">
    <h2>
      Components
      <small><?php echo link_to('new', '@components_new?project_id=' . $project['id']) ?></small>
    </h2>
    <?php foreach ($project->getComponentsList() as $component): ?>
      <div class="component">
        <?php echo link_to($component, 'components_edit', $component) ?>
        - <strong><?php echo $component['Owner'] ?></strong>
      </div>
    <?php endforeach; ?>
  </div>

</div> <!-- /grid_4 -->


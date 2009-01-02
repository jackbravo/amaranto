<div class="grid_8">

<h1>Projects List</h1>

<table class="list">
  <tbody>
    <?php foreach ($pager->getResults() as $project): ?>
    <tr class="info">
      <td>
        <h2><a href="<?php echo url_for('projects_show', $project) ?>"><?php echo $project->getName() ?></a></h2>
        <?php if ($project['Client']['id']): ?>
          for <?php echo link_to($project['Client'], 'contacts_show', $project['Client']) ?>
        <?php endif; ?>
      </td>
      <td><?php echo $project->getdescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include_partial('contacts/pager', array('pager' => $pager)) ?>

</div> <!-- /grid_8 -->

<div class="grid_4">
<div class="box">
  <a href="<?php echo url_for('projects_new') ?>">Add a new project</a>
</div>
</div>

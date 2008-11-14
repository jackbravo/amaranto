<h1>Projects List</h1>

<table>
  <tbody>
    <?php foreach ($project_list as $project): ?>
    <tr class="info">
      <td>
        <h2><a href="<?php echo url_for('projects_show', $project) ?>"><?php echo $project->getName() ?></a></h2>
      </td>
      <td><?php echo $project->getdescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php slot('sidebar-right') ?>
<div class="box">
  <a href="<?php echo url_for('projects_new') ?>">Add a new project</a>
</div>
<?php end_slot() ?>

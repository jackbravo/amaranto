<div class="grid_8">

<h1>Projects List</h1>

<div id="filters" class="tabs">
  <?php
    $links = array(
      array('label' => 'all', 'route' => '@projects_filter', 'query' => '_reset=1'),
      array('label' => 'mine', 'route' => '@projects_filter', 'query' => '_mine=1'),
    );

    foreach ($links as $route)
    {
      $current = $sf_user->getAttribute('projects_filter_name', 'all');
      $class = $current == $route['label'] ? 'active' : '';
      echo '&nbsp' . link_to(__($route['label']), $route['route'], array('class' => $class, 'query_string' => $route['query']));
    }
  ?>
</div>

<table class="list">
  <tbody>
    <?php foreach ($pager->getResults() as $i => $project): ?>
    <tr class="info <?php echo fmod($i,2) == 0 ? 'even' : 'odd' ?>">
      <td>
        <h2><a href="<?php echo url_for('projects_show', $project) ?>"><?php echo $project->getName() ?></a></h2>
        <?php if ($project['Owner']['id']): ?>
          <strong><?php echo $project['Owner'] ?></strong>
        <?php endif; ?>
      </td>
      <td><?php echo $project->getdescription() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php include_partial('pager', array('pager' => $pager)) ?>

</div> <!-- /grid_8 -->

<div class="grid_4">
<div class="box">
  <a href="<?php echo url_for('projects_new') ?>">Add a new project</a>
</div>
</div>

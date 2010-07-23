<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>
<?php include_javascripts() ?>
<?php include_stylesheets() ?>

<title><?php echo $sf_response->getTitle() ?> | Amaranto</title>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>

<div id="ajax-loader">
  Loading...
</div>
<script type="text/javascript">
$('#ajax-loader').ajaxStart(function(){
  $(this).show('normal');
}).ajaxStop(function(){
  $(this).hide('normal');
});
</script>

<div class="container_12">

<div class="fullspan" id="menu">
	<h1><?php echo link_to('Axai Manager', '@homepage') ?></h1>
  <?php if ($sf_user->isAuthenticated()): ?>
    <ul>
    <?php
      $links = array(
        'projects' => array('label' => 'Projects'),
        'issues' => array('label' => 'Issues'),
        'sf_guard_user' => array('label' => 'Users', 'perm' => 'admin'),
      );

      foreach ($links as $route => $link)
      {
        if (isset($link['perm']) && !$sf_user->hasCredential($link['perm'])) {
          continue;
        }
        $current = $sf_request->getParameter('module');
        $class = $current == $route ? 'active' : '';
        echo "<li class='$class'>" . link_to(__($link['label']), $route) . '</li>';
      }
    ?>
    </ul>

    <ul id="user-tools" class="top-right">
      <li><?php echo link_to(__('Logout'), '@sf_guard_signout') ?></li>
      <li>
        <form id="search-box" action="<?php echo url_for('issues_search') ?>" method="get">
          <input type="text" name="q" />
        </form>
      </li>
    </ul>
  <?php endif; ?>

  <div></div>

</div>

<div id="main" class="fullspan clearfix">

  <?php if ($sf_user->hasFlash('notice')): ?>
    <div class="box notice">
      <?php echo $sf_user->getFlash('notice') ?>
    </div>
  <?php endif; ?>

  <?php if ($sf_user->hasFlash('error')): ?>
    <div class="box error">
      <?php echo $sf_user->getFlash('error') ?>
    </div>
  <?php endif; ?>

  <?php echo $sf_content ?>
</div>

<div id="footer" class="fullspan">
  Copyright ©2008 <?php echo link_to('Axai', 'http://axai.com.mx') ?>
</div>

</div> <!-- /container_12 -->
</body>
</html>

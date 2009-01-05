<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<body>
<div class="container_12">

<div class="fullspan" id="menu">
	<h1><?php echo link_to('Axai Manager', '@homepage') ?></h1>
  <?php if ($sf_user->isAuthenticated()): ?>
    <ul>
    <?php
      $links = array(
        'contacts' => 'Contacts',
        'projects' => 'Projects',
        'issues' => 'Issues',
        'sf_guard_user' => 'Users',
      );

      foreach ($links as $route => $name)
      {
        $current = $sf_request->getParameter('module');
        $class = $current == $route ? 'active' : '';
        echo "<li class='$class'>" . link_to(__($name), $route) . '</li>';
      }
    ?>
    </ul>

    <ul id="user-tools" class="top-right">
      <li><?php echo link_to(__('Logout'), '@sf_guard_signout') ?></li>
    </ul>
  <?php endif; ?>

  <div></div>

</div>

<div id="main" class="fullspan clearfix">
  <?php echo $sf_content ?>
</div>

<div id="footer" class="fullspan">
  Copyright ©2008 <?php echo link_to('Axai', 'http://axai.com.mx') ?>
</div>

</div> <!-- /container_12 -->
</body>
</html>

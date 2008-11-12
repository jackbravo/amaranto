<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

<?php include_http_metas() ?>
<?php include_metas() ?>

<?php include_title() ?>

<link rel="shortcut icon" href="/favicon.ico" />

</head>
<?php if (has_slot('sidebar-right')): ?>
<body class="sidebar-right">
<?php else: ?>
<body class="sidebar-none">
<?php endif; ?>

<div id="menu">
	<h1><?php echo link_to('Axai Manager', '@homepage') ?></h1>
  <ul>
    <li><?php echo link_to(__('Home'), '@homepage') ?></li>
    <li><?php echo link_to(__('Contacts'), 'parties/index') ?></li>
    <li><?php echo link_to(__('Projects'), '@projects') ?></li>
  </ul>

  <div id="user-tools" class="top-right">
    <?php // echo link_to(__('Sign out'), '@sf_guard_signout') ?>
  </div>

	<div></div>

</div>

<div id="container" class="clear-block">

  <div id="main" class="column"><div id="squeeze">
    <?php echo $sf_content ?>
  </div></div> <!-- /squeeze /main -->

  <?php if (has_slot('sidebar-right')): ?>
  <div id="sidebar-right" class="column sidebar">
    <?php include_slot('sidebar-right') ?>
  </div>
  <?php endif; ?>

</div>

<div class="clearit"></div>
<div id="footer">
  Copyright ©2008 <?php echo link_to('Axai', 'http://axai.com.mx') ?>
</div>

</body>
</html>

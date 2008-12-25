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
  <ul>
    <li><?php echo link_to(__('Contacts'), 'parties/index') ?></li>
    <li><?php echo link_to(__('Projects'), '@projects') ?></li>
  </ul>

  <div id="user-tools" class="top-right">
    <?php // echo link_to(__('Sign out'), '@sf_guard_signout') ?>
  </div>

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

<?php

require_once '/usr/share/php5/symfony-1.2/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->disablePlugins('sfPropelPlugin');
    $this->enablePlugins(array('sfDoctrinePlugin', 'sfDoctrineGuardPlugin', 'sfFormExtraPlugin'));
  }
}

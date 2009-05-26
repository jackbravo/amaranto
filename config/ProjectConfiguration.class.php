<?php

require_once '/usr/share/php5/symfony-1.2/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  static protected $zendLoaded = false;
 
  static public function registerZend()
  {
    if (self::$zendLoaded)
    {
      return;
    }
 
    set_include_path(sfConfig::get('app_zend_lib_dir').PATH_SEPARATOR.get_include_path());
    require_once sfConfig::get('app_zend_lib_dir').'/Zend/Loader.php';
    Zend_Loader::registerAutoload();
    self::$zendLoaded = true;
  }

  public function setup()
  {
    $this->enableAllPluginsExcept(array('sfPropelPlugin', 'sfCompat10Plugin', 'sfProtoculousPlugin'));

    // use Doctrine 1.1
    sfConfig::set('sfDoctrinePlugin_doctrine_lib_path', sfConfig::get('sf_lib_dir') . '/vendor/doctrine/Doctrine.php');
  }
}

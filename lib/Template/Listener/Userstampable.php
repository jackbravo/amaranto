<?php

/**
 * Doctrine_Template_Listener_Timestampable
 *
 * @package     Doctrine
 * @subpackage  Template
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link        www.phpdoctrine.com
 * @since       1.0
 * @version     $Revision$
 * @author      Konsta Vesterinen <kvesteri@cc.hut.fi>
 */
class Listener_Userstampable extends Doctrine_Record_Listener
{
  /**
   * Array of timestampable options
   *
   * @var string
   */
  protected $_options = array();

  /**
   * __construct
   *
   * @param string $options
   * @return void
   */
  public function __construct(array $options)
  {
    $this->_options = $options;
  }

  /**
   * preInsert
   *
   * @param object $Doctrine_Event
   * @return void
   */
  public function preInsert(Doctrine_Event $event)
  {
    $createdName = $this->_options['created']['name'];
    $updatedName = $this->_options['updated']['name'];

    $modified = $event->getInvoker()->getModified();
    if (!isset($modified[$createdName])) {
      $event->getInvoker()->$createdName = self::getCurrentUserId();
    }
    if (!isset($modified[$updatedName])) {
      $event->getInvoker()->$updatedName = self::getCurrentUserId();
    }
  }

  /**
   * preUpdate
   *
   * @param object $Doctrine_Event
   * @return void
   */
  public function preUpdate(Doctrine_Event $event)
  {
    $updatedName = $this->_options['updated']['name'];
    $modified = $event->getInvoker()->getModified();
    if (!isset($modified[$updatedName])) {
      $event->getInvoker()->$updatedName = self::getCurrentUserId();
    }
  }

  /**
   * getTimestamp
   *
   * Gets the timestamp in the correct format
   *
   * @param string $type
   * @return void
   */
  static public function getCurrentUserId()
  {
    try
    {
      return sfContext::getInstance()->getUser()
        ->getAttribute('user_id', null, 'sfGuardSecurityUser');
    }
    catch (Exception $e)
    {
      return null;
    }
  }
}

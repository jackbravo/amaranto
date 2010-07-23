<?php

/**
 * Easily add created and updated at timestamps to your doctrine records
 */
class Userstampable extends Doctrine_Template
{
  /**
   * Array of timestampable options
   *
   * @var string
   */
  protected $_options = array(
    'created' => array(
      'name'     => 'created_by_user_id',
      'type'     => 'integer',
      'length'   => '5',
      'options'  => array(),
      'disabled' => false,
    ),
    'updated' => array(
      'name'    => 'updated_by_user_id',
      'type'    => 'integer',
      'length'  => '5',
      'options' => array(),
      'disabled' => false,
    )
  );

  /**
   * __construct
   *
   * @param string $array
   * @return void
   */
  public function __construct(array $options = array())
  {
    $this->_options = Doctrine_Lib::arrayDeepMerge($this->_options, $options);
  }

  /**
   * setTableDefinition
   *
   * @return void
   */
  public function setTableDefinition()
  {
    if( ! $this->_options['created']['disabled']) {
      $this->hasColumn($this->_options['created']['name'],
        $this->_options['created']['type'],
        $this->_options['created']['length'],
        $this->_options['created']['options']);
    }
    if( ! $this->_options['updated']['disabled']) {
      $this->hasColumn($this->_options['updated']['name'],
        $this->_options['updated']['type'],
        $this->_options['updated']['length'],
        $this->_options['updated']['options']);
    }
    $this->addListener(new Listener_Userstampable($this->_options));
  }

  public function setUp()
  {
    $this->hasOne('sfGuardUser as CreatedBy', array(
      'local' => $this->_options['created']['name'],
      'foreign' => 'id'));

    $this->hasOne('sfGuardUser as UpdatedBy', array(
      'local' => $this->_options['updated']['name'],
      'foreign' => 'id'));
  }
}

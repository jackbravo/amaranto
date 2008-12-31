<?php

/**
 * Note form.
 *
 * @package    form
 * @subpackage Note
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class NoteForm extends BaseNoteForm
{
  public function configure()
  {
    $this->widgetSchema->setLabel('body', 'Add a note');

    $this->widgetSchema['entity_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['project_id'] = new sfWidgetFormInputHidden();

    unset($this['created_at'], $this['updated_at'],
      $this['created_by_user_id'], $this['updated_by_user_id']);
  }
}

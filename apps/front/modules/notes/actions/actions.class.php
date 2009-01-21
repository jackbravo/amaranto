<?php

/**
 * notes actions.
 *
 * @package    amaranto
 * @subpackage notes
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class notesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeCreate(sfWebRequest $request)
  {
    $form = new NoteForm();
    if ($form->bindAndSave($request->getParameter('note')))
    {
      $this->redirectFromCreate($form);
    }
    else
    {
      $this->redirect($request->getReferer());
    }
  }

  protected function redirectFromCreate(sfForm $form)
  {
    if (is_numeric($form->getValue('project_id')))
    {
      $this->redirect('@projects_show?id='.$form->getValue('project_id'));
    }
    else if (is_numeric($form->getValue('entity_id')))
    {
      $this->redirect('@contacts_show?id='.$form->getValue('entity_id'));
    }
    else
    {
      throw new Exception('Must provide project or entity id');
    }
  }
}

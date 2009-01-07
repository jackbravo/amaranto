<?php

/**
 * Issue form.
 *
 * @package    form
 * @subpackage Issue
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 6174 2007-11-27 06:22:40Z fabien $
 */
class IssueForm extends BaseIssueForm
{
  public function configure()
  {
    unset($this['opened_at'], $this['opened_by'], $this['is_open']);
    unset($this['resolved_at'], $this['resolved_by']);
    unset($this['closed_at'], $this['closed_by']);
  }
}

<?php

class IssueBaseMessage extends Swift_Message
{
  public function __construct($issue, $body)
  {
    $routing = sfContext::getInstance()->getRouting();
    $issue_url = $routing->generate('issues_show', $issue, true);

    $subject = "Amaranto issue #{$issue->id}: {$issue->title}";
    $body .= <<<EOF


Id: {$issue->id}
Title: {$issue->title}
Project: {$issue->Project}
Priority: {$issue->Priority}
Opened by: {$issue->OpenedBy}

You can see this issue at: $issue_url

EOF
    ;
    parent::__construct($subject, $body);
    $this->setFrom(sfConfig::get('app_email_address'));
  }
}


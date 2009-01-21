<?php

class IssueMailerListener extends Doctrine_Record_Listener
{
  // TODO: get emails associated to users
  // TODO: consider adding last_message as a field for the issue table
  // TODO: send all messages at a diferent time
  public function postInsert(Doctrine_Event $event)
  {
    $issue = $event->getInvoker();
    if ($issue->assigned_to == $issue->opened_by) {
      return;
    }

    $routing = sfContext::getInstance()->getRouting();
    $issue_url = $routing->generate('issues_show', $issue, true);

    ProjectConfiguration::setupMailer();
    $mail = new Zend_Mail();
    $mail->setSubject("Amaranto issue #{$issue->id}: {$issue->title}");
    $mail->setFrom('jackbravo@gmail.com');
    $mail->addTo('jackbravo@gmail.com');
    $mail->setBodyText(<<<EOF
A new issue has been assigned to you:

Id: {$issue->id}
Title: {$issue->title}
Project: {$issue->Project}
Priority: {$issue->Priority}
Opened by: {$issue->OpenedBy}

You can see this issue at: $issue_url

EOF
);
    $mail->send();
  }
}


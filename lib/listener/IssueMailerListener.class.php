<?php

class IssueMailerListener extends Doctrine_Record_Listener
{
  // TODO: consider adding last_message as a field for the issue table
  public function postInsert(Doctrine_Event $event)
  {
    $issue = $event->getInvoker();
    if ($issue->assigned_to == $issue->opened_by) {
      return;
    }

    $routing = sfContext::getInstance()->getRouting();
    $issue_url = $routing->generate('issues_show', $issue, true);

    $mail = new MailQueue();
    $mail->setSubject("Amaranto issue #{$issue->id}: {$issue->title}");
    $mail->addTo($issue->AssignedTo->getEmail());
    $mail->setBody(<<<EOF
A new issue has been assigned to you:

Id: {$issue->id}
Title: {$issue->title}
Project: {$issue->Project}
Priority: {$issue->Priority}
Opened by: {$issue->OpenedBy}

You can see this issue at: $issue_url

EOF
);
    $mail->save();
  }
}


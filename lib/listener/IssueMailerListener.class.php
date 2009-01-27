<?php

class IssueMailerListener extends Doctrine_Record_Listener
{
  public function postInsert(Doctrine_Event $event)
  {
    $issue = $event->getInvoker();
    if ($issue->assigned_to != $issue->opened_by) {
      $this->sendIssue($issue, $issue->AssignedTo->getEmail(),
        "A new issue has been assigned to you");
    }
  }

  public function preUpdate(Doctrine_Event $event)
  {
    $issue = $event->getInvoker();
    $modified = $issue->getModified();

    if (array_key_exists('is_resolved', $modified))
    {
      if ($issue->is_resolved)
      {
        if ($issue->resolved_by != $issue->opened_by)
        {
          $this->sendIssue($issue, $issue->OpenedBy->getEmail(),
            "The issue {$issue->id} has been resolved");
        }
      }
      else
      {
        if ($issue->opened_by != $issue->assigned_to)
        {
          $this->sendIssue($issue, $issue->AssignedTo->getEmail(),
            "The issue {$issue->id} has been re-opened");
        }
      }
    }
  }

  // TODO: consider adding last_message as a field for the issue table
  public function sendIssue($issue, $to, $message)
  {
    $routing = sfContext::getInstance()->getRouting();
    $issue_url = $routing->generate('issues_show', $issue, true);

    $mail = new MailQueue();
    $mail->setSubject("Amaranto issue #{$issue->id}: {$issue->title}");
    $mail->addTo($to);
    $mail->setBody(<<<EOF
{$message}:

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


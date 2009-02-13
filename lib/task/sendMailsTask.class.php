<?php

class sendMailsTask extends sfBaseTask
{
  protected function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('limit', sfCommandArgument::REQUIRED, 'Number of emails to send'),
    ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'amaranto';
    $this->name             = 'send-mails';
    $this->briefDescription = 'Sends emails in the queue';
    $this->detailedDescription = <<<EOF
The [sendMails|INFO] task sends emails in the mail_queue table.
Call it with:

  [php symfony send-mails|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

    ProjectConfiguration::setupMailer();
    $queue_table = Doctrine::getTable('MailQueue');
    $queue = $queue_table->getPending($arguments['limit']);

    $done = array();
    $failed = array();
    foreach ($queue as $item)
    {
      try
      {
        $mail = new Zend_Mail('utf-8');
        $mail->setSubject($item['subject']);
        $mail->setBodyText($item['body']);
        array_map(array($mail, 'addTo'), explode(',', $item['recipients']));
        $mail->send();

        $done[] = $item['id'];
      }
      catch (Zend_Exception $e)
      {
        $failed[] = $item['id'];
      }
    }

    $queue_table->deleteItems($done);
    $queue_table->recordAttemps($failed);

    $this->logSection('mailer', sizeof($done) . ' emails sent');
    $this->logSection('mailer', sizeof($failed) . ' emails failed');
  }
}


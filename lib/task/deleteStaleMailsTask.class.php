<?php

class deleteStaleMailsTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name', 'front'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'amaranto';
    $this->name             = 'delete-stale-mails';
    $this->briefDescription = 'deletes stale emails from the queue';
    $this->detailedDescription = <<<EOF
The [deleteStaleMails|INFO] task deletes stale emails (max_attemps = attemps) from the queue.
Call it with:

  [php symfony deleteStaleMails|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'] ? $options['connection'] : null)->getConnection();

    $num_deleted = Doctrine::getTable('MailQueue')->deleteStale();

    $this->logSection('mailer', $num_deleted . ' emails deleted');
  }
}

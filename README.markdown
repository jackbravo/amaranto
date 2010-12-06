Requirements
============

- PHP >= 5.2

And you need to manually create a log directory on your project root folder
and make sure it is writable by the webserver. On ubuntu:

    mkdir log
    chgrp www-data log
    chmod g+w log


Installation
============

1. Install symfony in the correct location. One way to do this is

    cd /usr/share/php5
    sudo svn co http://svn.symfony-project.com/branches/1.4 symfony-1.4

2. Verify the symlink on web/sf is correct

3. Make sure the file con config/databases.yml has the correct information.
   If running in locally you can just give it the root username and password.
   If running on a server you need to create a database and a user for the app
   and use that. Just make sure the user has permission to create and drop
   its own database

4. Initialize the database. On development you can just do:

    cd /your/projet/path
    php symfony doctrine:build-all-reload

5. Apply your own configuration by creating your own app.yml and factories.yml
   and then setting the application address (to be used when sending emails)
   and your email address (to which all emails on dev environment will be sent).

    cd apps/front/config/
    cp apps/front/config/factories.yml.dist apps/front/config/factories.yml
    cp apps/front/config/app.yml.dist apps/front/config/app.yml

6. Send emails with the following command on the cron:

    */5 * * * * /usr/bin/php /path/to/amaranto/symfony mail:send-mails --env="prod" 100


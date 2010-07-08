Requirements
============

- PHP >= 5.2
- Markdown pecl extension

If you got this through git you need to init and update its submodules:

    git submodule init
    git submodule update

And you need to manually create a log directory on your project root folder
and make sure it is writable by the webserver. On ubuntu:

    mkdir log
    chgrp www-data log
    chmod g+w log


Installation
============

1. Install symfony in the correct location. One way to do this is

    cd /usr/share/php5
    sudo svn co http://svn.symfony-project.com/branches/1.3 symfony-1.3

2. Verify the symlink on web/sf is correct

3. Make sure the file con config/databases.yml has the correct information.
   If running in locally you can just give it the root username and password.
   If running on a server you need to create a database and a user for the app
   and use that. Just make sure the user has permission to create and drop
   its own database

4. Initialize the database. On development you can just do:

    cd /your/projet/path
    php symfony doctrine:build-all-reload


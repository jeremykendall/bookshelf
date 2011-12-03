bookshelf
=========

This application was created to accompany my Intro to #memtech: PHP presentation.

The purpose of the application is to show the evolution of a contrived "first" application;
from a nice try with some typical, horrific mistakes to a slightly more mature application
that (hopefully) demonstrates some best practices.

Versions
--------

This project contains four tags, each representing a stage in the evolution of the app.
After cloning the project, you can checkout each tag to watch the application evolve:

* `release-1.0.0` - First try, with an attempt to represent some typical, first application mistakes

    git checkout -b release-1.0.0 tags/release-1.0.0

* `release-1.1.0` - Moves duplicated code into a base file, adds error reporting

    git checkout -b release-1.1.0 tags/release-1.1.0

* `release-1.2.0` - Filters input, escapes output, uses prepared statements

    git checkout -b release-1.2.0 tags/release-1.2.0

* `release-1.3.0` - Adds a pseudo-service layer/DAO to abstract PDO calls

    git checkout -b release-1.3.0 tags/release-1.3.0

Usage
-----

To use the app, clone it, check out to whichever tag you want, and do
the following:

* Initialize the database via `php data/db/db-setup.php`

If you have any permissions problems, run the following:

    chmod 777 data/database.sqlite
    chmod 777 data/web.log

Enjoy!
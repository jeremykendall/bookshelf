bookshelf
=========

This application was created to accompany my Intro to PHP/PHP 102 presentations.

The purpose of the application is to show the evolution of a contrived "first" application;
from a nice try with some typical, horrific mistakes to a slightly more mature application
that (hopefully) demonstrates some best practices.

Versions
--------

This project contains five "stage" branches, each representing a stage in the evolution of the app.
After cloning the project, you can checkout each stage to watch the application evolve:

* stage0 - First try, with an attempt to represent some typical, first application mistakes

        git checkout -b stage0 origin/stage0

* stage1 - Moves duplicated code into a base file, adds error reporting

        git checkout -b stage1 origin/stage1

* stage1.5 - Corrects notices thrown after turning error reporting on

        git checkout -b stage1.5 origin/stage1.5

* stage2 - Filters input, escapes output, uses prepared statements

        git checkout -b stage2 origin/stage2

* stage3 - Adds a pseudo-service layer/DAO to abstract PDO calls

        git checkout -b stage3 origin/stage3

Usage
-----

To use the app, clone it, check out whichever branch you want, and do
the following:

* Initialize the database via `php data/db/db-setup.php`

If you have any permissions problems, run the following:

        chmod 777 data/db/bookshelf.db

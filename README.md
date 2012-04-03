PHP Database Migration
==============================

This is a database migration library for PHP/MySQL.

It mimics the behaviour of Ruby-on-Rails's database migration.

It supports:

* Create database
* Drop database
* Migrate database to the latest point
* Rollback one by one


How to use it
-----------------------

1. Open ```db_config.php``` and configure your MySQL stuffs.
2. Create your database by ```php migrate.php create```
3. Generate a migration script by ```php migrate.php generate create_first_table```
4. Open your new migration script in the directiory ```migration``` and edit it. ```up()``` is for the migrating action, and ```down()``` is for the rollback action.
5. Run migration with ```php migrate.php up```
6. Rollback the latest migration with ```php migrate.php down```
7. Drop the database with ```php migrate.php drop```


Author
------------
Tanin Na Nakorn


License
-----------

It is under Tanin's license, which means you can do whatever with it.
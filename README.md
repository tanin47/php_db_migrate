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

1. Open ```config.php``` and configure your MySQL stuffs.
2. Create your database by ```php migrate.php create```
3. Generate a migration script by ```php migrate.php generate create_first_table```
4. Open your new migration script in the directiory ```migration``` and edit it. ```up()``` is for the migrating action, and ```down()``` is for the rollback action.
5. Run migration with ```php migrate.php up```
6. Rollback the latest migration with ```php migrate.php down```
7. Drop the database with ```php migrate.php drop```

You might need to find where your PHP's binary located.


How to contribute
------------------------

1. Go to the ```test``` folder.
2. Configure database's parameters for testing in the beginning of ```test.php```
2. Run all tests by ```php test.php```

If all tests are passed, you may start your modification and submit me a pull request.


Author
------------
Tanin Na Nakorn


License
-----------

It is under Tanin's license, which means you can do whatever with it.

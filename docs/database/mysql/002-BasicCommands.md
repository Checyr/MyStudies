# Basic Commands

Before we create a database we need need to open a terminal with mysql maybe u have some problem's like me so will show a list of commands that you can type

* mysql -uroot -p
* sudo mysql -uroot -p <b>(if you are um linux)</b>
* mysql -u root -p -h localhost

if this doesn't work search for the error on google or stack overflow that will probrably show the solution for you or send me a message.

> **Note 1:**In this and in the community is recommend that you right somethings in upperCase like i i will use it



For Creating a database let's first see the database the already exist on our computer with de mysql terminal write the following command without forgetting the ";" becaus **MySQL** is also a language of programming 

~~~~sql
SHOW DATABASES;
~~~~
this probrably you give you somenthing like this:
~~~~
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| performance_schema |
| sakila             |
| sys                |
| world              |
+--------------------+
6 rows in set (0.00 sec)
~~~~

if you want to see the tables or use a database you type "use" and the name of the database

~~~~sql
USE world;
~~~~

if everything goes fine you'll recive "Database Changed" and now you are on the database that you choice you can use the first command "SHOW TABLES;" to show the tables


[ &nbsp; Next Page -->](003-CreateDatabase.md)
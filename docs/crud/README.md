#  Difference between Connection MySQLi and PDO

Exist a lot of ways to do connections with the database the MySQLi type accept only MySQL databases
but PDO accept more than 12 types.


## Doing the connection

For doing the connection we need

1. to set variable with the values of
   o kinda url of the server the user, password and the name of the database
   for the user we can use "root" because we are not deploying this on a cloud server
   and the password if you don't set anything for the user root you can just set empty.

2. Set PDO instantiated using new and put the PDO() after and between the parameters put the name the type of the database EX: mysql and put ":"host=and_the_variableserver;dbname=name_database,user,password;

~~~php
    $pdo = new PDO("mysql:host=$server;dbname=$banco",$usuario,$senha);
~~~    

> NOTE: If you get problems with pdo try put in a try and catch functions, so you can check what is the problem


## Creating a table using PDO

Before we create a table we need to know that every item on a table have an id we need to set the keys of the parameters
create a new variable and put she equal to "$pdo" pdo because it was the name of our variable to connect with the database,
and it's just put an Object called query that is the queries from the MySQL and pass the MySQL query.

~~~php
   try {
      $sql = $pdo->query("CREATE TABLE IF NOT EXISTS clients (
      id INT auto_increment NOT NULL PRIMARY KEY,
      first_name VARCHAR(100) NOT NULL,
      email VARCHAR(50) NULL,
      datinha DATE NULL)");
   }catch(PDOException $ex){
      echo "Something went wrong" . $ex->getMessage();
   }
~~~

Basically this block of code are saying that if a table called clients doesn't exist you create her with this
columns called id, first_name, email, datinha and if something went wrong the program go to the catch and pass
the error.


#### Inserting Data on MySQL

To insert Data on a table is the same process which change it's the command but this not a safe way to do 
this, so we need to see about query Injection


## Query Injection

For query injection it's most recommended use to prepare and passed after a array with the values like in the 
example below, we use the "?" to avoid to the user can type a command and add something or delete on the database:

~~~~php
    $sql = $pdo->prepare("INSERT INTO clients VALUES (default,?,?,?)");
    $sql->execute(array($name,$email,$data));
    echo "Submitted" . PHP_EOL;
~~~~
Query Injection it's a way to pre-see if the user add, remove or control anything about the database you can also use bindParam
for this we are separate in another file for cleaning code and security, after the set we can put the names of the columns
between "()" and say VALUES open new "()" and inside of set new variables but instead $ put a : and set using the method
bindParams() the value of each column

~~~~php
    try {
      $sql = $pdo->prepare("INSERT INTO clients (id, first_name, email, datinha) VALUES (default, :namess, :emails, :datinha)");
      $sql->bindParam(":namess", $_POST['name']);
      $sql->bindParam(":emails", $_POST['email']);
      $sql->bindParam(":datinha", $_POST['data']);
      $sql->execute();
      header("Location: /crud/index.php");
    }catch(PDOException $ex){
        echo "Something went wrong" . $ex->getMessage();
    }
~~~~

## READ 

For read or select the data's and show them on the screen we need to check if we have any kinda of data on the database
for this we create a variable that will receive the sql variable with the instance fetchAll();

~~~~php
   $datainfo = $sql->fetchAll();
~~~~

and we're going to use an if to with the function "count" to count the items on an array if is greater than 0
we execute a foreach with "=>" for get the key and the value of an array and show this on a table and put an else 
if is empty.

~~~~php
    $datainfo = $sql->fetchAll();
    if(count($datainfo) > 0){
        foreach ($datainfo as $key => $value) {
            echo"<tr>
                <td>".$value['id']."</td> 
                <td>".$value['first_name']."</td>
                <td>".$value['email']."</td>
                <td>".$value['datinha']."</td>
                <td><button>edit</button> <button>delete</button></td>
             </tr>";
        }
        echo "</table>";
    }else{
        echo "<p style='color: red'>The Database is empty</p>". \n;
    }
~~~~

## UPDATE

For update in a way that make the things more beautiful using bootstrap for creating a modal you'll need to set the code before
the programming and change the id and put a button with the parameters data-target equal the id of your modal and a data-toggle
equal modal and on the parameters of the button put the type for "submit" and put everything in a tag form with action with the
name of the file and now go to the file that you set, and you'll need to do a similar thing that you do when you add a data to database you just
will use UPDATE instead of INSERT INTO and SET we use WHERE and pass the id using bindParams
⚠⚠⚠ NEVER DO THIS WITHOUT USING A WHERE OR UPDATE WITHOUT A WHERE⚠⚠⚠
you don't want that your whole database be deleted and your delete file will be like this:



## DELETE

Put the table that is inside a foreach on a form and the action equals a file name that you create for this action and set
a query like this and after pass the id using the loop for catch the right value and put the method equals to post

~~~~php
   foreach ($datainfo as $key => $value) {
      echo"<tr>
          <form action='delete.php?id=".$value['id']."' method='post'>
          <td>".$value['id']."</td> 
          <td>".$value['first_name']."</td>
          <td>".$value['email']."</td>
          <td>".$value['datinha']."</td>
~~~~

now go to the file that you set, and you'll need to do a similar thing that you do when you add a data to database you just
will use DELETE FROM instead of INSERT INTO and pass the name of the database and instead of SET we use WHERE and pass the id using bindParams
⚠⚠⚠ NEVER DO THIS WITHOUT USING A WHERE OR UPDATE WITHOUT A WHERE⚠⚠⚠
you don't want that your whole database be deleted and your delete file will be like this:

~~~~php
   <?php
   require("db/connection.php");
   if ($_SERVER['REQUEST_METHOD'] == "POST"){
       try {
           $sql = $pdo->prepare("UPDATE clients SET first_name= :namesss, email = :emailss, datinha = :datinhas WHERE id = :ids");
           $sql->bindParam(":namesss",$_POST["nameinput"]);
           $sql->bindParam(":emailss",$_POST["emailinput"]);
           $sql->bindParam(":datinhas",$_POST["datinhainput"]);
           $sql->bindParam(":ids",$_POST["ids"]);
           $sql->execute();
           header("Location: /crud/index.php?foi");
       } catch (PDOException $exception) {
           echo $exception;
       }
   }
~~~~

Thank you for read ❤.
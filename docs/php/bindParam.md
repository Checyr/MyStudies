# BindParam
BindParam is a method to avoid to the user do a Query Injection and make sure tha is a type that you say for this is simple 

## $param
the first argument will be the argument that you pass on your prepare like this:

~~~~php
$sql= $pdo->prepare("INSERT INTO clients VALUES :names, :Ages, :city");
~~~~
you put a colon and the name of your param will receive after this we use the $var ↓. 

## $var
In $var we  put a variable or a VariablesGoblais like **\$_POST[ ]** and **\$_GET[ ]**
this second argument don't accept anything beyond a variable.

## $type:
type is set by default (empty) as string **PDO::PARAM_STR** so he'll set everybody to a string less the query  that executed but if you put this $type will avoid the query.<br>
If you set a type was a number and the user try to put something there is not a number the program will put a random number but won't execute the class or put an invalid type in your database 
# CLI (Command-line interface)

Before we talk about CLI we need to now the difference between Command-line interface and Terminal.
Command-line is any type of  interface that you can communicate with the computer in text, terminal is one 
of these examples, but a lot of program have they one Command-line, exist a lot of CLI but the most popular are
DOS(For Windows) and bash shell(For Linux and OS X).


## Introduction

We are going to use CLI SAPI(Server Applications Programming Interface) for developing application on shell.
For activating the SAPI we use **--enable-cli**


## How to use Interact Shell and Functions of CLI

Most of the web language's like python and the own PHP has an **Interact Shell** for use
they just put a **-a** after the command, after this will show a message "Interact Shell"
and now you can do simple code's like we can print an echo do a simple sum etc.
On CLI beyond execute simple codes you can discover new functions or show information about a functions
or classes

# Conclusion

CLI or Command-line Interface is a way to run code in a simple way for test or simple application in the code below we can see
an example:

~~~~php
<?php
    function menu(){
        $selecionado = 0;
        echo "------------------------" . PHP_EOL;
        echo "0 - Start". PHP_EOL;
        echo "1 - Options". PHP_EOL;
        echo "2 - Quit". PHP_EOL;
        echo "------------------------";
        $selecionado = readline("Type a option: ");
        if($selecionado == 0){
            echo "You Start Something";
        }elseif ($selecionado == 1){
            echo "There's no options here sorry";
        }else{
            echo "bye";
            exit();
        }

    }
menu();
~~~~

for run this code in an Interact Shell you type php type of the file and the arg **"-a"**

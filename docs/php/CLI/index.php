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
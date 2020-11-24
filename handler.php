<?php
    //Get phrase
    $phrase = $_POST["usr_input"];
    //Get keyword
    $keyword = $_POST["target_text"];
    //Get output from program
    $CONSOLE_LOG;
    //Store exit code for condition of checking result
    $USCC_EXIT_CODE;
    if (PHP_OS_FAMILY!=="Windows") {
        //When user using non-Windows system
        exec("python3 main.py -p ".$phrase." -k ".$keyword,$CONSOLE_LOG,$USCC_EXIT_CODE);
    } else {
        //When running in Windows
        exec("python main.py -p ".$phrase." -k ".$keyword,$CONSOLE_LOG,$USCC_EXIT_CODE);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>USCC Result</title>
    </head>
    <body>
        <h1>
            <?php
                //Decition for exit code depending executions
                switch($USCC_EXIT_CODE) {
                    case 0:
                        //Contains
                        echo("This phrase is containing keyword");
                        break;
                    case 1:
                        //Not contains
                        echo("This phrase does not contain keyword");
                        break;
                    default:
                        //Unexpected error
                        echo("No doubt that you inputed invalid data!!!!");
                        break;
                }
            ?>
        </h1>
    </body>
</html>


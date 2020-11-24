<?php
    $phrase = $_POST["usr_input"];
    $keyword = $_POST["target_text"];
    $CONSOLE_LOG;
    $USCC_EXIT_CODE;
    if (PHP_OS==="Linux") {
        exec("python3 main.py -p ".$phrase." -k ".$keyword,$CONSOLE_LOG,$USCC_EXIT_CODE);
    } else {
        exec("python main.py -p ".$phrase." -k ".$keyword,$CONSOLE_LOG,$USCC_EXIT_CODE);
    }
    
    switch($USCC_EXIT_CODE) {
        case 0:
            echo("This phrase is containing keyword");
            break;
        case 1:
            echo("This phrase does not contain keyword");
            break;
        default:
            echo("No doubt that you inputed invalid data here:\n".$CONSOLE_LOG);
            break;
    }
?>


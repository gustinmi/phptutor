
<?php

/**
* Function with arguments
*/
function logm($msg){
    if (php_sapi_name() == 'cli')  // from command line
        echo $msg . "\n";
    else
        error_log("$msg");         //inside web application
}

/**
* Function without parameters
*/
function sayHi(){
    echo logm("hi");
}


?>
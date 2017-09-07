<?php
require_once 'Error.class.php'; //Use me in your script
$ex = new ErrorHandle();//Use me in your script
//$ex->forceLoad();

$test = 2;
// Trigger error
if ($test > 1) {
    trigger_error("A custom error has been triggered");
    //dette er en test
}
?>

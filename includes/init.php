<?php
include_once(__DIR__.'/session.php');
include_once(__DIR__.'/../database/connect.php');
$debug = false;
if ($debug) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}


function console_log($output)
{
    $res = json_encode($output);

    echo '<script> console.log('.$res.'); </script>';
}

function validateAndFilter(&$array, ...$vars){
    $missing = [];

    foreach($vars as $var){
        if (!isset($array[$var])){
            array_push($missing, 'Request missing element \''.$var.'\' ');
        }
        else $array[$var] = preg_replace('/[^a-zA-Z0-9çéèêáàãôóòíìúù \']/', '', $array[$var]);
    }

    if (!empty($missing)){
        echo json_encode($missing);
        die();
    }
}


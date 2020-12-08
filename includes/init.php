<?php
include_once(__DIR__.'/session.php');
include_once(__DIR__.'/../database/connect.php');
$debug = true;
if ($debug) {
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
}


function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

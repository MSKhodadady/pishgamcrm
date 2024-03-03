<?php
function prv($v){
    echo "<pre>";
    print_r($v);
    echo "</pre>";
}
function pr($v){
    echo "<pre style='direction:ltr;text-align:left'>";
    print_r($v);
    echo "</pre>";

}
function Err(){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
}
?>

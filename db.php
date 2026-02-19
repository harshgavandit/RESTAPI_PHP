<?php



$dbHost="localhost";
$dbuser="root";
$dbPass="";
$dbname="api_php";

$mysqli=new mysqli($dbHost,$dbuser,$dbPass,$dbname);

if($mysqli->connect_error){
    echo json_encode([
        "error" => true,
        "message" => "Incorrect Database Connection details"
    ]);
    die();
}

?>
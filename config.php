<?php 
$api_key=$_SERVER["HTTP_API_KEY"] ?? '';
$valid_api_key="asdsaddasdsasdadas231123as";

if($api_key !== $valid_api_key){
    header('HTTP/1.1 401 unauthorized');
    $response['message']='Invalid API Key';
    echo json_encode($response);
    die();
}
?>
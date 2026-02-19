<?php

require_once('db.php');
require_once('config.php');
header("Content-Type: application/json");
error_reporting(E_ALL);
ini_set('display_errors', 1);


$action = $_GET['action'] ?? '';

function sanitize($data){
    global $mysqli;
    return $mysqli->real_escape_string($data);
}

$response=array(
    "error"=>true,
    "message"=>"error occured!"
);

if($action=="create-user"){

    $name=sanitize($_POST['name']) ;
    $email=sanitize($_POST['email']) ;
    $password=sanitize($_POST['password']) ;

    $query="INSERT INTO users (name,email,password)
            VALUES ('$name','$email','$password')";

    $result =$mysqli->query($query);

    if($result){
        echo json_encode([
            "error"=>false,
            "message"=>"User added successfully"
        ]);
    }
}
 else if($action=="login-user"){

    $email=sanitize($_POST['email']) ?? '';
    $password=sanitize($_POST['password']) ?? '';

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE email=? AND password=?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){

        $userRow=$result->fetch_assoc();

        echo json_encode([
            "error"=>false,
            "message"=>"User logged in Successfully",
            "data"=>$userRow
        ]);
    }
    else{
         header('HTTP/1.1 400 not found');
        echo json_encode([
            "error"=>true,
            "message"=>"Invalid email or password"
        ]);
    }

    die();
}
else if ($action=="get-user-details"){
    $user_id=sanitize($_POST['user_id']);

    $query = "SELECT * FROM users WHERE id=$user_id";
    $result=$mysqli->query($query);

    if($result->num_rows > 0){
        $userRow=$result->fetch_assoc();

        echo json_encode([
            "error"=>false,
            "message"=>"User found ",
            "data"=>$userRow
        ]);
    }
    else{
          header('HTTP/1.1 400 not found');
        echo json_encode([
            "error"=>true,
            "message"=>"User not found "
        ]);
    }

    die();
}
else if ($action=="get-products"){
    $user_id=sanitize($_POST['user_id']);
    $query="select * from products where id=$user_id";
    $result=$mysqli->query($query);

    if($result->num_rows >0){
        $response['error']=false;
        $response['message']=$result->num_rows . " products found";

        while($row = $result-> fetch_assoc()){
            $products[] = $row;

        }
        $response['data']=$products;
    }
else{
          header('HTTP/1.1 400 not found');
        echo json_encode([
            "error"=>true,
            "message"=>"no products found "
        ]);
    }
    echo json_encode($response);
}
    else{
        echo json_encode([
            "error"=>true,
            "message"=>$mysqli->error
        ]);
    }

    die();



$mysqli->close();
exit();
?>
<?php

// HTTPS Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');

// Including Libraries & models
require_once '../../config/session-start.php';
require_once '../../config/Database.php';
require_once '../../models/User.php';

// Instantiating Objects
$objDb = new Database;
$objUser = new User;

// if user is not logged in direct user to login page
if( !$objUser->isLoggedIn() ):
    header("Location: ../../views/login/index.php"); die;
endif;

// Receive posted data
$data = json_decode( file_get_contents("php://input"), true );

// insert into db 
$result = $objUser->deleteUser($objDb->conn, "id=".$data['id']);
var_dump($result);
die;
//error checking
if($result){
    echo json_encode(
        array(
            'success' => true,
            'message' => 'User Account Deleted Successfully'
        )
    );
}else {
    echo json_encode(
        array(
            'success' => false,
            'message' => 'User Account Could Not Be Deleted'
        )
    );
}
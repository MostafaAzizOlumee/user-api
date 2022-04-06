<?php

// HTTPS Header
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Including Database Library
include_once '../../config/Database.php';
include_once '../../models/User.php';

// Instantiating Objects
$objDb = new Database;
$objUser = new User;

// Get the id from URL parameter
$userID = ( isset($_GET['id']) )? (int)$_GET['id'] : 0;

// response json array 
$response = [];

// Sending the json response
if( !empty($userID) ){
    $result = $objUser->getOne($objDb->conn, [], "WHERE id =".$_GET['id']);
    if(!$result){
        // populating response data
        $response['success'] = true;
        $response['user'] = array(
                'first_name' => $objUser->firstName,
                'last_name' => $objUser->lastName,
                'username' => $objUser->username,
                'password' => $objUser->password,
                'role' => $objUser->role
        );       
    }else{
        // populating response data
        $response['success'] = false;
        $response['user'] = array();
        $response['error'] = 'No User found'; 
    }
}else{
    // populating response data
    $response['success'] = false;
    $response['user'] = array();
    $response['error'] = 'Invalid Id Provided'; 
}

// Sending response
print_r( json_encode($response) );
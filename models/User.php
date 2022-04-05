<?php
require_once "../../lib/QueryBuilder.php";

class User {
    // required fields to fetch data from db
    private $table = 'user';

    // user properties
    public $id;
    public $firstName;
    public $lastName;
    public $username;
    public $password;
    public $role;


    // FETCH one user by id
    public function getOne($conn, $cols, $condition) {
        // Preparing the Query
        $query = QueryBuilder::select($this->table, $cols, $condition, 1);
        // Execute the query
        $result = mysqli_query($conn, $query);
        if($result->num_rows == 1){
            // accessing table columns as variable
            extract( mysqli_fetch_assoc($result) );
            $this->id = $id;
            $this->firstName = $first_name;
            $this->lastName = $last_name;
            $this->username = $username;
            $this->password = $password;
            $this->role = $role;
        } else {
            return false;
        } 
    }
}
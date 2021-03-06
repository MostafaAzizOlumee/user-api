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
       // populating the user properties
        if($result && $result->num_rows == 1){
            // accessing table columns as variable
            extract( mysqli_fetch_assoc($result) );
            $this->id = $id;
            $this->firstName = $first_name;
            $this->lastName = $last_name;
            $this->username = $username;
            $this->password = $password;
            $this->role = $role;
            
            return true;
        }
            
        return false; 
    }

    // User login function
    public function login($db, $username, $password){
        // fetch and clean submitted data
        $username = ( isset($username) && !empty($username) ) ? $db->escape_data($username) : '';
        $password = ( isset($password) && !empty($password) ) ? $db->escape_data($password) : '';
        if( !empty($username) && !empty($password) ):

            // checking if the user exists in db and verifing the password 
            $result = $this->getOne($db->conn, [], "WHERE username='$username'");
            // verifing password 
            if( $result && password_verify($password, $this->password) ){
                return true;
            }
        endif;
             
        return false;
    }
    
    // intializes the $_SESSION super global variable
    public function saveSessionData(){
       
        $_SESSION['id'] = $this->id;
        $_SESSION['first_name'] = $this->firstName;
        $_SESSION['last_name'] = $this->lastName;
        $_SESSION['username'] = $this->username;
        $_SESSION['password'] = $this->password;
        $_SESSION['role'] = $this->role;
    
    }
    
    // Checks if user is logged in
    public function isLoggedIn(){
        if( isset($_SESSION['id']) ){
            return true;
        }
         
        return false;
    }

    // Create User Account function
    public function createUserAccount($conn, $data){
        // Preparing the INSERT query
        $query = QueryBuilder::insert($this->table, $data);

        // executing the query
        return mysqli_query($conn, $query);
    }

  // update user data  
  public function updateUser($conn, $data, $condition) {
    // Preparing the Update query
    $query = QueryBuilder::update($this->table, $data, $condition);
    
    // executing the query
    return mysqli_query($conn, $query);
  }
  
  // delete user  
  public function deleteUser($conn, $condition) {
    // Preparing the Update query
    $query = QueryBuilder::delete($this->table, $condition);
    
    // executing the query
    return mysqli_query($conn, $query);
  }
  
}
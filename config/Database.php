<?php
    class Database{
        // connection parameters
        public $dbHost = 'localhost';
        public $dbName = 'auth_db';
        public $dbUsername = 'authen_user';
        public $dbPassword = 'authen_user123';
        public $conn;


        public function __construct(){
            // Connection to Database
            $this->conn = @mysqli_connect($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            //Error handling
            if (!$this->conn) {
                echo 'Error No. ' . mysqli_connect_errno() . PHP_EOL . '<br>';
                echo 'Error: ' . mysqli_connect_error() . PHP_EOL . '<br>';
                exit('Error: Unable to connect to MySQL' . PHP_EOL);
            }
        }
    }
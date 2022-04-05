<?php
    class Database{
        // connection parameters
        private const DB_HOST = 'localhost';
        private const DB_NAME = 'auth_db';
        private const DB_USERNAME = 'auth_db';
        private const DB_PASSWORD = 'auth_db';
        public $conn;


        public function __construct(){
            // Connection to Database
            $this->conn = @mysqli_connect($this->DB_HOST, $this->DB_USER, $this->DB_PASSWORD, $this->DB_NAME);
            if ($this->conn) {
                echo 'Error No. ' . mysqli_connect_errno() . PHP_EOL . '<br>';
                echo 'Error: ' . mysqli_connect_error() . PHP_EOL . '<br>';
                exit('Error: Unable to connect to MySQL' . PHP_EOL);
            }
        }
    }
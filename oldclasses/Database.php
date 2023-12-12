<?php

class Database {
    private $dbHost   = 'localhost';
    private $dbUser   = 'root';
    private $dbPass   = '123456'; 
    private $dbName = 'phpdev_db';

    private $dbConnection;
    private $error;
    private $statement;

    public function __construct(){
        //Set Data Source Name (DSN)
        $dsn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;
        //set Options
        $options = array(
            PDO::ATTR_PERSISTENT  => true,
            PDO::ATTR_ERRMODE     => PDO::ERRMODE_EXCEPTION
        );
        //Create new PDO
        try{
            $this->dbConnection = new PDO($dsn, $this->dbUser, $this->dbPass, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    // Check if the database connection is successful
    public function isConnected() {
        return $this->dbConnection !== null && empty($this->error);
    }

     // Prepare an SQL query for execution
    public function query($query){
        $this->statement = $this->dbConnection->prepare($query);
    }

    // Bind a parameter with value and data type
    public function bindParameter($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
            case is_int($value);
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
            $type = PDO::PARAM_STR;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    // Execute the prepared query
    public function executeQuery(){
        return $this->statement->execute();
    }

    public function lastInsertId(){
        $this->dbConnection->lastInsertId();
    }

     // Execute the query and fetch all results
    public function fetchAllResults(){
        $this->executeQuery();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
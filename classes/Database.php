<?php

class Database {
    private $host   = 'localhost';
    private $user   = 'root';
    private $pass   = '123456'; //not real
    private $dbname = 'phpdev_db';

    private $dbh;
    private $error;
    private $stmt;

    public function __construct(){
        //set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        //set Options
        $options = array(
            PDO::ATTR_PERSISTENT  => true,
            PDO::ATTR_ERRMODE     => PDO::ERRMODE_EXCEPTION
        );
        //Create new PDO
        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function isConnected() {
        return $this->dbh !== null && empty($this->error);
    }

    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null){
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
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

}
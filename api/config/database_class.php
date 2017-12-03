<?php

class Database{

    // database credentials
    private $host       = "localhost";
    private $database   = "contacts";
    private $username   = "root";
    private $password   = "";

    // public vars
    public $connection = null;

    // public funtions
    // initialize connection to database
    public function connect(){

        // trying connection to host
        $this->connection = mysqli_connect($this->host, $this->username, $this->password);

        // expect UTF-8 encoding
        mysqli_query($this->connection, "SET NAMES utf8");

        // if connection to host fails
        if($this->connection === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // query for creating database if it does not exists yet
        $sql = "CREATE DATABASE IF NOT EXISTS contacts";

        // if the query fails
        if(!mysqli_query($this->connection, $sql)){
            echo "ERROR: Could not execute $sql. " . mysqli_error($this->connection);
        }

        // trying connection to the database
        $this->connection = mysqli_connect($this->host, $this->username, $this->password, $this->database);

        // query for creating table of people if it does not exists yet
        $sql = "CREATE TABLE IF NOT EXISTS people(
                id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
                first_name VARCHAR(30) NOT NULL,
                last_name VARCHAR(30),
                email VARCHAR(70) UNIQUE,
                phone VARCHAR(70) UNIQUE,
                whatsapp VARCHAR(70) UNIQUE
        )";

        // if the query fails
        if(!mysqli_query($this->connection, $sql)){
            echo "ERROR: Could not execute $sql. " . mysqli_error($this->connection);
        }

        return $this->connection;
    }
}

//mysqli_close($link);
?>
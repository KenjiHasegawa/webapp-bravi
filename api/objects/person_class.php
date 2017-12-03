<?php

class Person{

    // database info
    private $connection;
    private $table = "people";

    // object properties
    private $headers = array();
    public $id;
    public $first_name = "";
    public $last_name = "";
    public $email = "";
    public $phone = "";
    public $whatsapp = "";

    // constructor
    public function __construct($db){
        $this->connection = $db;
    }

    public function get_person($get_array){
        $query = "SELECT id, first_name, last_name, email, phone, whatsapp 
                  FROM ".$this->table."
                  WHERE ";

        end($get_array);
        $last_key = key($get_array);
        foreach($get_array as $key => $value){
            if (!($key === $last_key)){
                $query .= $key ."=". $value . " and ";
            }
            else {
                $query .= $key ."=". $value;
            }
        }

        $query .=" ORDER BY first_name ASC";

        // execute query
        $results = mysqli_query($this->connection, $query);

        return $results;

    }

    public function get_all(){
        // select all query
        $query = "SELECT id, first_name, last_name, email, phone, whatsapp 
                  FROM ".$this->table."
                  ORDER BY first_name ASC";

        // execute query
        $results = mysqli_query($this->connection, $query);

        return $results;
    }

    public function create(){
        if (is_null($this->first_name)){
            return false;
        }

        $vars['first_name']  = $this->first_name;
        $vars['last_name'] =  $this->last_name;
        $vars['email'] =  $this->email;
        $vars['phone'] =  $this->phone;
        $vars['whatsapp'] =  $this->whatsapp;

        $query = "INSERT INTO ".$this->table . " (";

        foreach($vars as $key => $item){
            // (first_name, last_name, email, phone, whatsapp)
            if (!is_null($item)){
                $query .=$key.",";
            }
        }

        if(substr($query, -1, 1) === ','){
            $query = substr(trim($query), 0, -1);
        }
        $query .= ')';


        $query .=  " VALUES (";

        foreach($vars as $key => $item){
            // (".$this->first_name.", ".$this->last_name.", ".$this->email.", ".$this->phone.", ".$this->whatsapp)
            if (!is_null($item)) {
                $query .= $this->$key . ",";
            }
        }
        if(substr($query, -1, 1) === ','){
            $query = substr(trim($query), 0, -1);
        }
        $query .= ')';

        substr_replace($query, ')', strrpos($query, ','),1);

        echo $query;
        echo '<br>';

        $result = mysqli_query($this->connection,$query);
        return $result;
    }

    public function update(){
        if (is_null($this->id)){
            return false;
        }

        $vars['last_name'] =  $this->last_name;
        $vars['email'] =  $this->email;
        $vars['phone'] =  $this->phone;
        $vars['whatsapp'] =  $this->whatsapp;


        $query = "UPDATE ".$this->table . " SET";

        foreach($vars as $key => $item){
            // (first_name, last_name, email, phone, whatsapp)
            if (!is_null($item)){
                $query .= $key."=".$this->$key.",";
            }
        }

        if(substr($query, -1, 1) === ','){
            $query = substr(trim($query), 0, -1);
        }
        $query .= 'WHERE id='.$this->id;

        echo $query;
        echo '<br>';

        $result = mysqli_query($this->connection,$query);
        return $result;
    }

    public function delete(){

    }
}
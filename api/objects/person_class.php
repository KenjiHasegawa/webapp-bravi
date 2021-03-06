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

    public function get_person(){

        $vars['id'] = $this->id;
        $vars['first_name']  = $this->first_name;
        $vars['last_name'] =  $this->last_name;
        $vars['email'] =  $this->email;
        $vars['phone'] =  $this->phone;
        $vars['whatsapp'] =  $this->whatsapp;

        $query = "SELECT id, first_name, last_name, email, phone, whatsapp 
                  FROM ".$this->table."
                  WHERE ";


        foreach($vars as $key => $value){
            if (!is_null($value) or $value != ""){
                $query .= $key."=".$value." and ";
            }
        }
        substr_replace($query, ' ', strrpos($query, ','),1);
        $query = substr(trim($query), 0, -4);



        $query .=" ORDER BY first_name ASC";

        // execute query
        $results = mysqli_query($this->connection, $query);
        $rows = mysqli_num_rows($results);

        if ($results) {
            if ($rows > 0) {

                $people_array = array();

                while ($row = mysqli_fetch_array($results)) {
                    $people_item = array(
                        "id" => $row['id'],
                        "first_name" => $row['first_name'],
                        "last_name" => $row['last_name'],
                        "email" => $row['email'],
                        "phone" => $row['phone'],
                        "whatsapp" => $row['whatsapp']
                    );

                    $people_array[] = $people_item;
                }

                echo json_encode($people_array, JSON_PRETTY_PRINT );
            } else {
                echo json_encode(
                    array("message" => "No contacts found."),
                    JSON_PRETTY_PRINT
                );
            }
        }
        else{
            echo json_encode(
                array("message" => "No contacts found."),
                JSON_PRETTY_PRINT
            );
        }
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
                $query .= "'".$this->$key . "',";
            }
        }
        if(substr($query, -1, 1) === ','){
            $query = substr(trim($query), 0, -1);
        }
        $query .= ')';

        substr_replace($query, ')', strrpos($query, ','),1);

        $result = mysqli_query($this->connection,$query);
        return $result;
    }

    public function update(){
        if (is_null($this->id)){
            return false;
        }
        $vars['first_name'] = $this->first_name;
        $vars['last_name'] =  $this->last_name;
        $vars['email'] =  $this->email;
        $vars['phone'] =  $this->phone;
        $vars['whatsapp'] =  $this->whatsapp;


        $query = "UPDATE ".$this->table . " SET ";

        foreach($vars as $key => $item){
            // (first_name, last_name, email, phone, whatsapp)
            if (!is_null($item)){
                $query .= $key."='". (string) $this->$key."',";
            }
        }

        if(substr($query, -1, 1) === ','){
            $query = substr(trim($query), 0, -1);
        }
        $query .= ' WHERE id='.$this->id;


        $result = mysqli_query($this->connection,$query);
        return $result;
    }

    public function delete(){
        if (is_null($this->id)){
            return false;
        }

        $query = "DELETE FROM ".$this->table;

        $query .= ' WHERE id='.$this->id;

        $result = mysqli_query($this->connection,$query);
        return $result;

    }
}
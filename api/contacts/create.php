<?php

// include database and object files
require_once ('../config/database_class.php');
require_once ('../objects/person_class.php');

// initialize objects and connection
$database = new Database();
$db = $database->connect();
$person = new Person($db);

// get data from post
$data = $_POST;
var_dump($data);
// set person object values
$person->id         =   (isset($data['id']) and  !is_null($data['id']))             ? $data['id'] : null;
$person->first_name =   (isset($data['first_name']) and $data['first_name']!== "")  ?  (string) $data['first_name'] : null;
$person->last_name  =   (isset($data['last_name']) and $data['last_name']!== "")    ?  (string) $data['last_name'] : null;
$person->email      =   (isset($data['email']) and $data['email']!== "")            ?  (string) $data['email'] : null;
$person->phone      =   (isset($data['phone']) and $data['phone']!== "")            ?  (string) $data['phone'] : null;
$person->whatsapp   =   (isset($data['whatsapp']) and $data['whatsapp']!== "")      ?  (string) $data['whatsapp'] : null;

// try to create the contact
if($person->create()){
    echo json_encode(
        array("message" => "Contact created."),
        JSON_PRETTY_PRINT
    );
}
else{
    echo json_encode(
        array("message" => "Unable to create contact."),
        JSON_PRETTY_PRINT
    );
}

?>
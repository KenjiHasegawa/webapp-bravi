<?php

// include database and object files
require_once ('../config/database_class.php');
require_once ('../objects/person_class.php');

// initialize objects and connection
$database = new Database();
$db = $database->connect();
$person = new Person($db);

// get data from json post
//$data = json_decode(file_get_contents('php://input'), true);
$data = $_POST;

// set person object values

$person->id = isset($_GET['id'])? $_GET['id'] : null;
$person->first_name = isset($data['first_name']) ? $data['first_name'] : null;
$person->last_name = isset($data['last_name']) ? $data['last_name'] : null;
$person->email = isset($data['email']) ? $data['email'] : null;
$person->phone = isset($data['phone']) ? $data['phone'] : null;
$person->whatsapp = isset($data['whatsapp']) ? $data['whatsapp'] : null;

// try to create the contact
if($person->update()){
    echo json_encode(
        array("message" => "Contact updated."),
        JSON_PRETTY_PRINT
    );
}
else{
    echo json_encode(
        array("message" => "Unable to update contact."),
        JSON_PRETTY_PRINT
    );
}

?>
<?php

// include database and object files
require_once ('../config/database_class.php');
require_once ('../objects/person_class.php');

// initialize objects and connection
$database = new Database();
$db = $database->connect();
$person = new Person($db);

// set person object values
$person->id = isset($_GET['id'])? $_GET['id'] : null;

// try to create the contact
if($person->delete()){
    echo json_encode(
        array("message" => "Contact deleted."),
        JSON_PRETTY_PRINT
    );
}
else{
    echo json_encode(
        array("message" => "Unable to delete contact."),
        JSON_PRETTY_PRINT
    );
}

?>
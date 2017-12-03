<?php

// include database and object files
include_once ('../config/database_class.php');
include_once ('../objects/person_class.php');

// initialize objects and connection
$database = new Database();
$db = $database->connect();
$person = new Person($db);

$data = $_GET;
// query to return one person
$person->first_name = isset($data['first_name']) ? $data['first_name'] : null;
$person->last_name = isset($data['last_name']) ? $data['last_name'] : null;
$person->email = isset($data['email']) ? $data['email'] : null;
$person->phone = isset($data['phone']) ? $data['phone'] : null;
$person->whatsapp = isset($data['whatsapp']) ? $data['whatsapp'] : null;

$json = $person->get_person();
echo $json;

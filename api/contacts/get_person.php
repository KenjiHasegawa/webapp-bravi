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
$person->id         =   (isset($data['id']) and  !is_null($data['id']))             ? $data['id'] : null;
$person->first_name =   (isset($data['first_name']) and $data['first_name']!== "")  ? $data['first_name'] : null;
$person->last_name  =   (isset($data['last_name']) and $data['last_name']!== "")    ? $data['last_name'] : null;
$person->email      =   (isset($data['email']) and $data['email']!== "")            ? $data['email'] : null;
$person->phone      =   (isset($data['phone']) and $data['phone']!== "")            ? $data['phone'] : null;
$person->whatsapp   =   (isset($data['whatsapp']) and $data['whatsapp']!== "")      ? $data['whatsapp'] : null;

$person->get_person();


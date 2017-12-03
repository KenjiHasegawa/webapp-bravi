<?php

// include database and object files
include_once ('../config/database_class.php');
include_once ('../objects/person_class.php');

// initialize objects and connection
$database = new Database();
$db = $database->connect();
$person = new Person($db);

// query to return all the contacts
$query = $person->get_all();


echo '<pre>';
if ($query) {
    $rows = mysqli_num_rows($query);

    if ($rows > 0) {

        $people_array = array();
        $people_array["rows"] = array();

        while ($row = mysqli_fetch_array($query)) {

            // extract facilitates vars calling: $row['name'] -> $name
            extract($row);

            $people_item = array(
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone" => $phone,
                "whatsapp" => $whatsapp
            );

            array_push($people_array["rows"], $people_item);
        }

        echo json_encode($people_array, JSON_PRETTY_PRINT);
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
echo '</pre>';



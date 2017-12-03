<?php
require_once('layout_header.php');
$url = 'localhost/BraviProject/api/agenda/get_person.php?first_name="Mary"';
$obj = json_decode(file_get_contents($url), true);
var_dump($obj)

?>

<?php
require_once('layout_footer.php');
?>
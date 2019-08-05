<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../../db.php';

session_start();

$con = new pdo_db("classifications");

$classification = $con->getData("SELECT * FROM classifications WHERE id = $_POST[id]");

$type = $con->getData("SELECT * FROM type WHERE id = ".$classification[0]['type_id']);
$classification[0]['type_id'] = $type[0];

header("Content-Type: application/json");
echo json_encode($classification[0]);

?>
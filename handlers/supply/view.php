<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../../db.php';

session_start();

$con = new pdo_db();

$type = $con->getData("SELECT * FROM supplier WHERE id = $_POST[id]");

header("Content-Type: application/json");
echo json_encode($type[0]);

?>
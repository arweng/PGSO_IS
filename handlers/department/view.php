<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../../db.php';

session_start();

$con = new pdo_db();

$department = $con->getData("SELECT * FROM department WHERE id = $_POST[id]");

header("Content-Type: application/json");
echo json_encode($department[0]);

?>
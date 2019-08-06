<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../../db.php';

session_start();

$con = new pdo_db("units");

$unit = $con->getData("SELECT * FROM units WHERE id = $_POST[id]");

$department = $con->getData("SELECT * FROM department WHERE id = ".$unit[0]['dept_id']);
$unit[0]['dept_id'] = $department[0];

header("Content-Type: application/json");
echo json_encode($unit[0]);

?>
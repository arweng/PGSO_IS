<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

$con = new pdo_db('equipment');

$equipment = $con->getData("SELECT * FROM equipment");

echo json_encode($equipment);

?>
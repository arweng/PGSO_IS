<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

$con = new pdo_db('equipment');

$edit = $con->getData("SELECT * FROM equipment WHERE id = ".$_POST['id']);

echo json_encode($edit[0]);

?>
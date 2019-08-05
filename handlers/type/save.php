<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("type");


if ($_POST['type']['id']) {
	
	$type = $con->updateObj($_POST['type'],'id');
	
} else {
	
	$type = $con->insertObj($_POST['type']);
	echo $con->insertId;

}

?>
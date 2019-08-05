<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("units");


if ($_POST['unit']['id']) {
	
	$unit = $con->updateObj($_POST['unit'],'id');
	
} else {
	
	$unit = $con->insertObj($_POST['unit']);
	echo $con->insertId;

}

?>
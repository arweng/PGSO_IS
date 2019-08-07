<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("department");


if ($_POST['department']['id']) {
	
	$unit = $con->updateObj($_POST['department'],'id');
	
} else {
	
	$unit = $con->insertObj($_POST['department']);
	echo $con->insertId;

}

?>
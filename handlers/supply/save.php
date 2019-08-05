<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("supplier");


if ($_POST['supply']['id']) {
	
	$supply = $con->updateObj($_POST['supply'],'id');
	
} else {
	
	$supply = $con->insertObj($_POST['supply']);
	echo $con->insertId;

}

?>
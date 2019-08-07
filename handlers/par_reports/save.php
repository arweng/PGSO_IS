<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("model");


if ($_POST['model']['id']) {
	
	$model = $con->updateObj($_POST['model'],'id');
	
} else {
	
	$model = $con->insertObj($_POST['model']);
	echo $con->insertId;

}

?>
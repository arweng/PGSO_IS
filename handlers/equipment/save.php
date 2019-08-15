<?php

header("Content-Type: application/json");

$_POST = json_decode(file_get_contents('php://input'), true);

include_once '../../db.php';

$con = new pdo_db("equipment");

$_POST['input']['acquisition_date'] = date("Y-m-d",strtotime($_POST['input']['acquisition_date']));

if ($_POST['input']['id']) {
	
	$equipment = $con->updateObj($_POST['input'],'id');
	
} else {
	
	$equipment = $con->insertObj($_POST['input']);
	echo $con->insertId;

}

?>
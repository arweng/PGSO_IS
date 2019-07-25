<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

$con = new pdo_db('equipment');

$_POST['acquisition_date'] = date("Y-m-d",strtotime($_POST['acquisition_date']));

if ($_POST['id']>0) {

	$_POST['system_log'] = "CURRENT_TIMESTAMP";
	$con->updateData($_POST,'id');
	
} else {

	unset($_POST['id']);
	$con->insertDataMulti($_POST);

};	

?>
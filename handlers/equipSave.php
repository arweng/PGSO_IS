<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

$con = new pdo_db('equipment');


if ($_POST['id']>0) {

	$con->updateData($_POST,'id');
	
} else {

	foreach($_POST as $key => $post){

		$_POST[$key]['acquisition_date'] =  date("Y-m-d",strtotime($post['acquisition_date']));

	};

	unset($_POST['id']);
	$con->insertDataMulti($_POST);

};	


?>
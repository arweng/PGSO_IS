<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../db.php';

$con = new pdo_db('equipment');

$equipment = $con->getData("SELECT id, property_no, description, model, acquisition, acquisition_date, acquisition_cost, _serial, inventory_tag , classification, _condition, supplier, remarks FROM equipment");

foreach ($equipment as $i => $equipments) {
	
	$equipment[$i]['_date'] = date("M j, Y",strtotime($equipments['acquisition_date']));
	
};


echo json_encode($equipment);

?>
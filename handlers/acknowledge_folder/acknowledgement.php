<?php

$_POST = json_decode(file_get_contents('php://input'), true);

require_once '../../db.php';

$con = new pdo_db('equipment');

$acknowledgement = $con->getData("SELECT id, property_no, description, model, acquisition, acquisition_cost, _serial, inventory_tag , classification, _condition, supplier, remarks FROM equipment");


echo json_encode($acknowledgement);

?>
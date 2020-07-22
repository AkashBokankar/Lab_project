<?php
require_once('../model/config.php');

$output = array('status'=> 'fail', 'error' => 'something went wrong');
if(isset($_POST)){ // Fetching variables of the form which travels in URL
$comp_name = $_POST['comp_name'];
$comp_id = $_POST['comp_id'];
$comp_cost = $_POST['comp_cost'];
$gst = $_POST['gst'];
$t_c_cost = $_POST['t_c_cost'];
//Insert Query of SQL
$query = "INSERT INTO componentdetails(ComponentName, ComponentID, ComponentCost, GSTSlab, TotalCost) values ('$comp_name', '$comp_id', '$comp_cost', '$gst', '$t_c_cost')";
$result = $conn->exec($query);

if($result){
$output = array('status' => 'success');

}

}
// print_r($clid);
echo json_encode($output);
	die();

?>
<?php
require_once('../model/config.php');

$output = array('status'=> 'fail', 'error' => 'something went wrong');
if(isset($_POST)){ // Fetching variables of the form which travels in URL
$regno = $_POST['regno'];
$v_name = $_POST['v_name'];
$contact_person = $_POST['contact_person'];
$address = $_POST['address'];
$contact = $_POST['contact'];
// print_r($contact);
//Insert Query of SQL
$query = "INSERT INTO clientdetails(RegNo, Vehical_Name, Address, ContactNo, ContactName) values ('$regno', '$v_name', '$address', '$contact', '$contact_person')";
$result = $conn->exec($query);

if($result){

$output = array('status' => 'success');

}

}
// print_r($clid);
echo json_encode($output);
	die();

?>
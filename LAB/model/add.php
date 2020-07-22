<?php
require_once('../model/config.php');
 $len = 7;
$bytes = openssl_random_pseudo_bytes($len, $cstrong);
    $hex   = bin2hex($bytes);
$str = "MCLA";
$output = array('status'=> 'fail', 'error' => 'something went wrong');
if(isset($_POST)){ // Fetching variables of the form which travels in URL
$name = $_POST['name'];
$id = $str.$hex;
$contact = $_POST['contact'];
$address = $_POST['address'];
//Insert Query of SQL
$query = "INSERT INTO clients(Client_name, Client_id, Client_contact, Client_address) values ('$name', '$id', '$contact', '$address')";
$result = $conn->exec($query);

if($result){
$output = array('status' => 'success' , 'id' => $id);

}

}
// print_r($clid);
echo json_encode($output);
	die();

?>
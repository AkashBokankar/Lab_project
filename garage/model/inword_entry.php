<?php require_once('../model/config.php'); 

// $sqll = "SELECT Sr_no FROM inward_instrument_detail ORDER BY Sr_no DESC ";

$sql = "SELECT * from mr_record where status='open'";
$array = $conn->query($sql);
/*$ini_array = parse_ini_file("../config/sample.ini");
print_r($ini_array['ULR_NO']);*/
?>

<div id="user">
<?php

foreach ($array as $key) {
	 echo '<a href="#demo1" class="nav-link nav_name" data-toggle="collapse">'.$key['Client_name'].'
	 		<div class="display_none" style="display:none;"><label class="lab_id">'.$key['Lab_id'].'</label><label class="client_address">'.$key['Client_address'].'</label>
	 		<label class="client_name">'.$key['Client_name'].'</label>
	 		<label class="challan_no">'.$key['Customer_challan_number'].'</label>
	 		<label class="challan_date">'.$key['Customer_challan_date'].'</label>
	 		<label class="plan_date">'.$key['Plandate_of_delivery'].'</label></div>'
    // session_start();
    // $_SESSION['Client_name']=$key['Client_name'];

// $Lab_id = $key['Lab_id'];

     ?>
<?php
}

?>
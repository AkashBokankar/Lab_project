<?php require_once('../model/config.php'); 
$current_id = $_POST['current_id'];
$instru = "SELECT * from instrument_description where Lab_id='".$current_id."'";
$open = $conn->query($instru);

?>
	<option value="" disabled selected>Choose your option</option>
<?php
foreach ($open as $key_name) {
// $count = $key_name['Quantity'];
// print_r($count); 
echo '	
		<option class="optcls">'.$key_name['Instrument_name'].'</option>'	

     ?>
<?php
}

?>
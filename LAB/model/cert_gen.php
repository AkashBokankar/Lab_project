<?php require_once('../model/config.php'); 
$cert_id = $_POST['cert_id'];
if (empty($cert_id)) {
	
	$out = array('error' => 'No data found');

}else{
$sql = "SELECT * from inward_instrument_detail where Instrument_no like '%".$cert_id."%'";
$array = $conn->query($sql);
?>

<div id="user">

	<table class="table" style="text-align: center;">
    <tr>
      <th>Name</th>
      <th>ID</th>
      <th>Calibrated_By</th>
      
    </tr>
<?php
foreach ($array as $key) {
	 echo '
   <tr class="search_result">
      <td class="search_name"><a> '.$key['Name'].'</a></td>
      <td class="search_id"><a>  '.$key['Lab_id'].'</a></td>
      <td class="search_address"><a> '.$key['Calibrated_By'].'</a></td>
      </tr>'
    // session_start();
    // $_SESSION['Client_name']=$key['Client_name'];
     ?>
<?php
}
}
?>
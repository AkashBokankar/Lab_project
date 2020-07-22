<?php require_once('../model/config.php'); 
$clregno = $_POST['regno'];
if (empty($clregno)) {
	
	$out = array('error' => 'No data found');

}else{
$sql = "SELECT * from clientdetails where RegNo like '%".$clregno."%'";
$array = $conn->query($sql);
?>

<div id="user">

	<table class="table" style="text-align: center;">
    <tr>
      <th>Reg No.</th>
    <!--   <th>Vehical Name</th>
      <th>Contact Person</th>
      <th>Contact No.</th>
      <th>Address</th> -->
      
    </tr>
<?php
foreach ($array as $key) {
	 echo '
   <tr class="search_result">
      <td class="search_regno"><a> '.$key['RegNo'].'</a></td>
      <td class="search_vehical_name" style="display:none;"><a>  '.$key['Vehical_Name'].'</a></td>
      <td class="search_contact_person" style="display:none;"><a> '.$key['ContactName'].'</a></td>
      <td class="search_contact_no" style="display:none;"><a> '.$key['ContactNo'].'</a></td>
      <td class="search_address" style="display:none;"><a> '.$key['Address'].'</a></td>
      </tr>'
    // session_start();
    // $_SESSION['Client_name']=$key['Client_name'];
     ?>
<?php
}
}
?>
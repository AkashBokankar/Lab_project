<?php require_once('../model/config.php'); 
$clname = $_POST['name'];
if (empty($clname)) {
	
	$out = array('error' => 'No data found');

}else{
$sql = "SELECT * from clients where Client_name like '%".$clname."%'";
$array = $conn->query($sql);
?>

<div id="user">

	<table class="table" style="text-align: center;">
    <tr>
      <th>Name</th>
      <th>ID</th>
      <th>Address</th>
      
    </tr>
<?php
foreach ($array as $key) {
	 echo '
   <tr class="search_result">
      <td class="search_name"><a> '.$key['Client_name'].'</a></td>
      <td class="search_id"><a>  '.$key['Client_id'].'</a></td>
      <td class="search_address"><a> '.$key['Client_address'].'</a></td>
      </tr>'
    // session_start();
    // $_SESSION['Client_name']=$key['Client_name'];
     ?>
<?php
}
}
?>
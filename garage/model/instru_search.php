<?php require_once('../model/config.php'); 
$instru_namevar = $_POST['instru_name'];
if (empty($instru_namevar)) {
	
	$out = array('error' => 'No data found');

}else{
$sql = "SELECT * from componentdetails where ComponentName like '%".$instru_namevar."%'";
$array = $conn->query($sql);
?>

<div id="user">

	<table class="table" style="text-align: center;">
    <tr>
      <th>Name</th>
      <th>ID</th>
      <th>Total Cost</th>
      
    </tr>
<?php
foreach ($array as $key) {
	 echo '
   <tr class="search_instruresult">
      <td class="search_instruname"><a> '.$key['ComponentName'].'</a></td>
      <td class="search_instruid"><a>  '.$key['ComponentID'].'</a></td>
      <td class="search_instrucost"><a> '.$key['TotalCost'].'</a></td>
      </tr>'
    // session_start();
    // $_SESSION['Client_name']=$key['Client_name'];
     ?>
<?php
}
}
?>
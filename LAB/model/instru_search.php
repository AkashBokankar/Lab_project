<?php require_once('../model/config.php'); 
$instru_namevar = $_POST['instru_name'];
if (empty($instru_namevar)) {
	
	$out = array('error' => 'No data found');

}else{
$sql = "SELECT * from instrument_master where instrument_name like '%".$instru_namevar."%'";
$array = $conn->query($sql);
?>

<div id="user">

	<table class="table" style="text-align: center;">
    <tr>
      <th>Name</th>
      <th>ID</th>
      <th>Make</th>
      
    </tr>
<?php
foreach ($array as $key) {
	 echo '
   <tr class="search_instruresult">
      <td class="search_instruname"><a> '.$key['instrument_name'].'</a></td>
      <td class="search_instruid"><a>  '.$key['instrument_id'].'</a></td>
      <td class="search_instrunmake"><a> '.$key['Make'].'</a></td>
      </tr>'
    // session_start();
    // $_SESSION['Client_name']=$key['Client_name'];
     ?>
<?php
}
}
?>
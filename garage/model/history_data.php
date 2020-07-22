<?php require_once('../model/config.php'); 
$current_date = $_POST['selected_date'];
$current_reg = $_POST['history'];
$reg_history = "SELECT * from jobcard where job_date='".$current_date."' AND RegNo='".$current_reg."'";
$open = $conn->query($reg_history);

?>
<div id="user">

	<table class="table" style="text-align: center;">
    <tr>
      <th><h5>Service</h5></th>
      <th><h5>Amount</h5></th>
     
      
    </tr>
<?php
foreach ($open as $key_name) {
/* $count = $key_name['Amount'];
 print_r($count);*/ 
echo '	
		<tr class="data_display">

		<td style="border-bottom:1px solid #dee2e6;">'.$key_name['ServiceDetails'].'</td>
		
	    <td style="border-bottom:1px solid #dee2e6;">'.$key_name['Amount'].'</td>
		</tr>
		'

     ?>
<?php
}

?>
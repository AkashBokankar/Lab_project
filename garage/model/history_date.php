<?php require_once('../model/config.php'); 
$current_reg = $_POST['history'];
$reg_history = "SELECT DISTINCT job_date from jobcard where RegNo='".$current_reg."'";
$open = $conn->query($reg_history);

?>
<div id="user1">
<h5>Date</h5>
<?php
foreach ($open as $key_name) {
// $count = $key_name['Quantity'];
// print_r($count); 
echo '	



<ul>
		<li><a class="job_date col-md-4">'.$key_name['job_date'].'</a></li>
		</ul>
		'	

     ?>
<?php
}

?>
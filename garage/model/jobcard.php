<?php
require_once('../model/config.php');
$output = array('status'=> 'fail', 'error' => 'something went wrong');
// $nameerr=$addresserr=$challan_noerr=$challan_dateerr=$receipt_dateerr=$nabl_certerr=$item_conditionerr=$plan_dateerr=$item_dueerr=$report_nameerr=$special_inst_caliberr=$payment_modeerr=$est_cal_chargeserr=$other_chargeserr=$lab_iderr=$dateerr=$delivery_modeerr=$instru_nameerr=$instru_qtyerr = "";

if(isset($_POST)){ // Fetching variables of the form which travels in URL
				if (empty($_POST['Search'])) {
					$regno = "NA";
				}else{
					$regno = $_POST['Search'];
				}
			if (empty($_POST['date'])) {
				$date = "NA";
			}else{
				$date = $_POST['date'];

			}
			
			
$lab_id_result = "SELECT Sr_no FROM jobcard ORDER BY Sr_no DESC LIMIT 1";
$id_result = $conn->prepare($lab_id_result);
$id_result->execute(array());
$row = $id_result->fetch();				
$jobcard_id = $row['Sr_no'];
$jobcard_id = sprintf("%04s", ++$jobcard_id); 	


// Insert Query of SQL
try {
$conn->beginTransaction();

			if (empty($_POST['instru_name'])) {
				$instru_name = "NA";
		
			}else{

				$instru_name = $_POST['instru_name'];
			}

			if (empty($_POST['instru_qty'])) {
				$instru_qty = "NA";
		
			}else{

				$instru_qty = $_POST['instru_qty'];
			}

				if (empty($_POST['amount'])) {
				$amount = "NA";
		
			}else{

				$amount = $_POST['amount'];
			}
			
			// foreach (array_combine($amount, $ins_amount)) {
				
			
foreach ( array_combine($instru_name, $instru_qty) as $key => $ins_qty) 
	 {
				
$query = "INSERT INTO jobcard(JobCardID, RegNo, ServiceDetails, Amount, job_date) values ('$jobcard_id', '$regno', '$key', '$ins_qty', '$date')";	
 $result = $conn->exec($query); 
 }
 // }

 if ($result) {
	
 	$conn->commit();
 $output = array('status' => 'success', 'jobcard_id' => $jobcard_id);
 }else{

 	$output = array('error' => 'error');
 }

}
 catch (Exception $e) {
 $conn->rollback();
 	$output = $e->getMessage();
}

	}
 echo json_encode($output);
 	die();

?>
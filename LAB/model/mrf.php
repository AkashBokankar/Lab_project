<?php
require_once('../model/config.php');
$output = array('status'=> 'fail', 'error' => 'something went wrong');
// $nameerr=$addresserr=$challan_noerr=$challan_dateerr=$receipt_dateerr=$nabl_certerr=$item_conditionerr=$plan_dateerr=$item_dueerr=$report_nameerr=$special_inst_caliberr=$payment_modeerr=$est_cal_chargeserr=$other_chargeserr=$lab_iderr=$dateerr=$delivery_modeerr=$instru_nameerr=$instru_qtyerr = "";

if(isset($_POST)){ // Fetching variables of the form which travels in URL
				if (empty($_POST['namedis'])) {
					$name = "NA";
				}else{
					$name = $_POST['namedis'];
				}
			if (empty($_POST['Cl_address'])) {
				$address = "NA";
			}else{
				$address = $_POST['Cl_address'];

			}
			if (empty($_POST['challan_no'])) {
				$challan_no = "NA";
				
			}else{

				$challan_no = $_POST['challan_no'];	
			}
			if (empty($_POST['challan_date'])) {
				$challan_date = "NA";
				
			}else{

				$challan_date = $_POST['challan_date'];	
			}
			if (empty($_POST['receipt_date'])) {
				$receipt_date = "NA";
				
			}else{

				$receipt_date = $_POST['receipt_date'];	
			}
			if (empty($_POST['nabl_cert'])) {
				$nabl_cert = "NA";
	
			}else{

				$nabl_cert = $_POST['nabl_cert'];	
			}
			if (empty($_POST['item_condition'])) {
				$item_condition = "NA";
		
			}else{

				$item_condition = $_POST['item_condition'];	
			}
			if (empty($_POST['plan_date'])) {
				$plan_date = "NA";
				
			}else{

				$plan_date = $_POST['plan_date'];	
			}
			if (empty($_POST['item_due'])) {
				$item_due = "NA";
				
			}else{

				$item_due = $_POST['item_due'];	
			}
			if (empty($_POST['report_name'])) {
				$report_name = "NA";
		
			}else{

				$report_name = $_POST['report_name'];
			}
			if (empty($_POST['special_inst_calib'])) {
				$special_inst_calib = "NA";
			
			}else{

				$special_inst_calib = $_POST['special_inst_calib'];
			}
			if (empty($_POST['payment_mode'])) {
				$payment_mode = "NA";
		
			}else{


				$payment_mode = $_POST['payment_mode'];
			}
			if (empty($_POST['est_cal_charges'])) {
				$est_cal_charges = "NA";
			
			}else{

				$est_cal_charges = $_POST['est_cal_charges'];
			}
			if (empty($_POST['other_charges'])) {
				$other_charges = "NA";
				
			}else{

				$other_charges = $_POST['other_charges'];
			}
			
			if (empty($_POST['date'])) {
				$date = "NA";
				
			}else{

				$date = $_POST['date'];
			}
			if (empty($_POST['delivery_mode'])) {
				$delivery_mode = "NA";
		
			}else{

				$delivery_mode = $_POST['delivery_mode'];
			}
			
$lab_id_result = "SELECT Sr_no FROM mr_record ORDER BY Sr_no DESC LIMIT 1";
$id_result = $conn->prepare($lab_id_result);
$id_result->execute(array());
$row = $id_result->fetch();				
$lab_id = $row['Sr_no'];
$lab_id = sprintf("%04s", ++$lab_id); 	


$status = 'open';
$is_instru_populated = 'false';

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
			
	 foreach (array_combine($instru_name, $instru_qty) as $key => $ins_qty) {
				
	  $instru_query = "INSERT INTO instrument_description(Instrument_name, Quantity,Lab_id) values ('$key', '$ins_qty','$lab_id')";
	  
	  $instru_result = $conn->exec($instru_query);
 
 }

 if ($instru_result) {
 $query = "INSERT INTO mr_record(Client_name, Client_address, Lab_id, Status, is_instrument_populated, Customer_challan_number, Customer_challan_date, Condition_of_items, Req_of_calibration, Plandate_of_delivery, Next_cal_duedate, Report_in_name, Special_instruction, Mode_of_payment, Estimated_charges, Other_charges, Dispatch_mode, Dispatch_date) values ('$name', '$address', '$lab_id', '$status', '$is_instru_populated', '$challan_no', '$challan_date', '$item_condition', '$nabl_cert', '$plan_date', '$item_due', '$report_name', '$special_inst_calib', '$payment_mode', '$est_cal_charges', '$other_charges', '$delivery_mode', '$date' )";	
 $result = $conn->exec($query);
 }
 if ($instru_result && $result) {
	
 	$conn->commit();
 $output = array('status' => 'success', 'lab_id' => $lab_id);
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
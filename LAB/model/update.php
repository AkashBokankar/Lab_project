<?php
require_once('../model/config.php');
// $output = array('status'=> 'fail', 'error' => 'something went wrong');
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

					
			

$status = 'open';
$is_instru_populated = 'false';

// Insert Query of SQL
try {
$conn->beginTransaction();

		$lab_id_instru = array('lab_id' => $lab_id);
		if (empty($_POST['instru_name'])) {
				$instru_name = "NA";
		
			}else{

				$instru_name = $_POST['instru_name'];
			}

			if (empty($_POST['instru_qty'])){

				$instru_qty = "NA";
		
			}else{

				$instru_qty = $_POST['instru_qty'];
			}
			
	 foreach (array_combine($instru_name, $instru_qty) as $key => $ins_qty) {
					foreach ($lab_id_instru as $id_value) {
						# code...
					 if (empty($key) || empty($ins_qty)) {
					 $instru_qtyerr = "Some Instrument Quantity fields are blank";
					 // goto end;
				 }else{
	  $instru_query = "UPDATE instrument_description SET Instrument_name = '$key', Quantity = '$ins_qty' WHERE Lab_id = '$id_value'";
	  
	  $instru_result = $conn->exec($instru_query);
  }
 }
}
 if ($instru_result) {
 $query = "UPDATE mr_record SET Client_name = '$name', Client_address = '$address', Status = '$status', is_instrument_populated = '$is_instru_populated', Customer_challan_number = '$challan_no', Customer_challan_date = '$challan_date', Condition_of_items = '$item_condition', Req_of_calibration = '$nabl_cert', Plandate_of_delivery = '$plan_date', Next_cal_duedate = '$item_due', Report_in_name = '$report_name', Special_instruction = '$special_inst_calib', Mode_of_payment = '$payment_mode', Estimated_charges = '$est_cal_charges', Other_charges = '$other_charges', Dispatch_mode = '$delivery_mode', Dispatch_date = '$date' WHERE Lab_id = '$lab_id'";	
 $result = $conn->exec($query);
 }
 if ($instru_result && $result) {
	
 	$conn->commit();
 $output = array('status' => 'success');
 }else{

 	// goto end;
 }

}
 catch (Exception $e) {
 $conn->rollback();
 	$output = $e->getMessage();
}

	}
  end:
 echo json_encode($output);
 	die();

?>
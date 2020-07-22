<?php
require_once('../model/config.php');
//Initializing variables to NA
/*$inword_entryForm = "NA";			
$inword_name = "NA";
$inword_address = "NA";

$inword_plan_delivery_date = "NA";
$inword_challan_number = "NA";
$inword_challan_date = "NA";
*/

$output = array('status'=> 'fail', 'error' => 'something went wrong');
if(isset($_POST)){ // Fetching variables of the form which travels in URL
if (empty($_POST['inword_labid'])) {
		$inword_labid = "NA";
}else{
		$inword_labid = $_POST['inword_labid'];	
}
if (empty($_POST['instru_size'])) {
	$instru_size = "NA";
}else{

	$instru_size = $_POST['instru_size'];
}
if (empty($_POST['instru_range'])) {
	$instru_range = "NA";
}else{
	$instru_range = $_POST['instru_range'];
}
if (empty($_POST['instru_make'])) {
	$instru_make = "NA";
}else{
	$instru_make = $_POST['instru_make'];
}
if (empty($_POST['instru_idno'])) {
	$instru_idno = "NA";
}else{
	$instru_idno = $_POST['instru_idno'];
}
if (empty($_POST['instru_lc_grd'])) {
	$instru_lc_grd = "NA";
}else{
	$instru_lc_grd = $_POST['instru_lc_grd'];
}
if (empty($_POST['instru_lc'])) {
	$instru_lc = "NA";
}else{
	$instru_lc = $_POST['instru_lc'];
}
if (empty($_POST['instru_qty'])) {
	$instru_qty = "NA";
}else{
	$instru_qty = $_POST['instru_qty'];
}
if (empty($_POST['instrument_name'])) {
	$instrument_name = "NA";
}else{
	$instrument_name = $_POST['instrument_name'];
}
if (empty($_POST['calib_date'])) {
	$calib_date = "NA";
}else{
	$calib_date = $_POST['calib_date'];
}

if (empty($_POST['calib_by'])) {
	$calib_by = "NA";
}else{
	$calib_by = $_POST['calib_by'];
}
if (empty($_POST['instrument_id'])) {
	$instrument_id = "NA";
}else{
	$instrument_id = $_POST['instrument_id'];
}
if (empty($_POST['remark'])) {
	$remark = "NA";
}else{
	$remark = $_POST['remark'];
}
$inword_ins_id = "SELECT ID_no FROM inward_instrument_detail WHERE Lab_id = '$inword_labid'";
$inword_ins_id_result = $conn->prepare($inword_ins_id);
 $inword_ins_id_result->execute(array());
 $row_ins_id = $inword_ins_id_result->fetchAll();

  foreach ($row_ins_id as $id) {
  	// $row_ins_id = $id['ID_no'];
  	// print_r($row_ins_id);
  	   	if (in_array($instru_idno, $id)) {
    		// print_r($row_ins_id);
 	 $output = array('status'=> 'fail', 'error' => 'This instrument already entered');
 		goto end;	
 	// $output = array('status'=> 'fail', 'error' => 'something went wrong');
 	}
  }
 
 		// print_r($row_ins_id);
 		// echo "not equal";
 		$id = "SELECT * FROM session_data ORDER BY Sr_no DESC LIMIT 1";
$id_result = $conn->prepare($id);
$id_result->execute(array());
$row = $id_result->fetch();
$cert_series = $row['Cert_series'];
$url_series = $row['Ulr_series'];
 $cert_series = sprintf("%04s", ++$cert_series); 
 $url_series = sprintf("%04s", ++$url_series);
 // $cert_seriesdis = "MC/"
  $ulr_no = "CC26861800000".$url_series."F";
switch ($instrument_name) {
	case 'Plug Gauge':
		$cert_id = "MC/01/18-19/".$cert_series;
		break;
		case 'Snap Gauge':
		$cert_id = "MC/02/18-19/".$cert_series;
		break;
			case 'Measuring Pin':
		$cert_id = "MC/03/18-19/".$cert_series;
		break;
			case 'External Micrometer':
		$cert_id = "MC/04/18-19/".$cert_series;
		break;
			case 'Depth Micrometer':
		$cert_id = "MC/05/18-19/".$cert_series;
		break;
			case 'Plunger Dial':
		$cert_id = "MC/06/18-19/".$cert_series;
		break;
			case 'Lever Dial':
		$cert_id = "MC/07/18-19/".$cert_series;
		break;
			case 'Dial Thickness Gauge':
		$cert_id = "MC/08/18-19/".$cert_series;
		break;
			case 'Dial Bore Gauge':
		$cert_id = "MC/09/18-19/".$cert_series;
		break;
			case 'Setting Standard':
		$cert_id = "MC/10/18-19/".$cert_series;
		break;
			case 'Vernier Caliper(Digital/Dial/Analog)':
		$cert_id = "MC/1/18-19/".$cert_series;
		break;
			case 'Vernier Height Gauge(Digital/Dial/Analog)':
		$cert_id = "MC/12/18-19/".$cert_series;
		break;
			case 'Ring Gauge':
		$cert_id = "MC/13/18-19/".$cert_series;
		break;
			case 'Dial Snap Gauge':
		$cert_id = "MC/14/18-19/".$cert_series;
		break;
			case 'Feeler Gauge':
		$cert_id = "MC/15/18-19/".$cert_series;
		break;
			case 'V-Block':
		$cert_id = "MC/16/18-19/".$cert_series;
		break;
			case 'Depth Vernier(Digital/Dial/Analog)':
		$cert_id = "MC/17/18-19/".$cert_series;
		break;
			case 'Thread Plug Gauge':
		$cert_id = "MC/18/18-19/".$cert_series;
		break;
			case 'Thread Ring Gauge':
		$cert_id = "MC/19/18-19/".$cert_series;
		break;
			case 'Taper Plug':
		$cert_id = "MC/20/18-19/".$cert_series;
		break;
			case 'Taper Ring':
		$cert_id = "MC/21/18-19/".$cert_series;
		break;
			case 'Bevel Protractor':
		$cert_id = "MC/22/18-19/".$cert_series;
		break;
			case 'Surface Plate':
		$cert_id = "MC/23/18-19/".$cert_series;
		break;
			case 'Electronic Probe':
		$cert_id = "MC/24/18-19/".$cert_series;
		break;
			case 'Thread Measuring Wire':
		$cert_id = "MC/25/18-19/".$cert_series;
		break;
			case 'Profile Projector':
		$cert_id = "MC/26/18-19/".$cert_series;
		break;
			case 'Electronic Height Gauges':
		$cert_id = "MC/27/18-19/".$cert_series;
		break;
			case 'Caliper Checker':
		$cert_id = "MC/28/18-19/".$cert_series;
		break;
			case 'Three Point Micrometer':
		$cert_id = "MC/29/18-19/".$cert_series;
		break;
	default:
		$cert_id = "MC/30/18-19/".$cert_series;
		break;
}
//Insert Query of SQL

$query = "INSERT INTO inward_instrument_detail(Lab_id, Instrument_no, Name, Instru_Range, Size, Make, LC_GRD, LC, ID_no, Qty, Date_Of_Calibration, Certificate_ID, ULR_no, Calibrated_By, Remark) values ('$inword_labid', '$instrument_id', '$instrument_name', '$instru_range','$instru_size', '$instru_make', '$instru_lc_grd', '$instru_lc', '$instru_idno', '$instru_qty', '$calib_date', '$cert_id', '$ulr_no', '$calib_by', '$remark')";
$result = $conn->exec($query);
$query = "INSERT INTO session_data(Cert_no, Cert_series, Ulr_no, Ulr_series) values ('$cert_id', '$cert_series', '$ulr_no', '$url_series')";
$result = $conn->exec($query);
 if($result){
$output = array('status' => 'success', 'cert_id' => $cert_id, 'url_series' =>$url_series);

}

 	
 
  // print_r($row_ins_id);



// $last_id = $conn->lastInsertId();
// print_r($last_id);


}
// print_r($clid);
end:
echo json_encode($output);
	die();

?>
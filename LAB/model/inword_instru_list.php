<?php require_once('../model/config.php'); 

// $sqll = "SELECT Sr_no FROM inward_instrument_detail ORDER BY Sr_no DESC ";
$current_labid = $_POST['current_labid'];
$sql = "SELECT * from inward_instrument_detail WHERE Lab_id='".$current_labid."'";
$array = $conn->query($sql);
/*$ini_array = parse_ini_file("../config/sample.ini");
print_r($ini_array['ULR_NO']);*/
?>

<div id="user">
<?php

foreach ($array as $key) {
	$name = $key['Name'];
	// print_r($name);
		switch($name)
		{
			case "Snap Gauge" :
			case "Plug Gauge" :
			case "Ring Gauge" :
			case "Thread Plug Gauge" :
			case "Thread Ring Gauge" :
			case "Taper Plug" :
			case "Taper Ring" :
			case "V-Block" :
			case "Setting Standard" :
				
				echo '<div class="database_table">
				<table class="table table-bordered " id="insrument_add_table" style="text-align: center;"><tbody><tr><th scope="col" class="instrument_name" width="20%">Instrument Name</th>
				<td><label id="instrument_name">'.$key['Name'].'</label></td><td width="6%"><a><img src="img/award.png" class="cert_gen" name="certificate_gen" id="'.$key['Instrument_no'].'" style="width:20px;"></a></td><td width="6%"><a><img src="img/table-grid.png" class="datasheet_gen" name="datasheet_gen" id="datasheet_'.$key['Instrument_no'].'" style="width:20px;"></a></td></tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th>Size</th><th>Make</th><th>ID No.</th></tr></thead><tbody><tr>
				<td><label id="instru_size" >'.$key['Size_min'].'-'.$key['Size_max'].'</label></td>
			
				<td><label id="instru_make">'.$key['Make'].'</label></td>
				<td><label id="instru_idno">'.$key['ID_no'].'</label></td></tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th scope="col" class="calib_date">Date of Calibration</th><th scope="col" class="cert_id">Certificate ID</th><th scope="col" class="url_no">ULR NO.</th><th scope="col" class="calib_by">Calibrated By</th><th>Instrument ID</th><th scope="col" class="remark">Remark</th></tr></thead><tbody><tr>
				<td ><label id="calib_date">'.$key['Date_Of_Calibration'].'</label></td>
				<td><label id="cert_id">'.$key['Certificate_ID'].'</label></td>
				<td><label id="ulr_no">'.$key['ULR_no'].'</label></td>
				<td><label id="calib_by">'.$key['Calibrated_By'].'</label></td>
				<td><label id="instrument_id">'.$key['Instrument_no'].'</label></td>
				<td><label id="remark">'.$key['Remark'].'</label></td>
				</tr></tbody></table></div>';
			break;
			case "External Micrometer" :
			case "Depth Micrometer" :
			case "Plunger Dial" :
			case "Lever Dial" :
			case "Dial Thickness Gauge" :
			case "Vernier Caliper(Digital/Dial/Analog)" :
			case "Depth Vernier(Digital/Dial/Analog)" :
			case "Vernier Height Gauge(Digital/Dial/Analog)" :
			case "Bevel Protractor" :
			case "Electronic Probe" :
			case "Profile Projector" :
			case "Electronic Height Gauge" :
			case "Three Point Micrometer" :
			case "Measuring Pin" :
			case "Thread Measuring Wire" :
			
				echo '<div class="database_table"><table class="table table-bordered " id="insrument_add_table" style="text-align: center;"><tbody><tr><th scope="col" class="instrument_name" width="20%">Instrument Name</th>
				<td><label id="instrument_name">'.$key['Name'].'</label></td><td width="6%"><a><img src="img/award.png" class="cert_gen" name="certificate_gen" id="'.$key['Instrument_no'].'" style="width:20px;"></a></td><td width="6%"><a><img src="img/table-grid.png" class="datasheet_gen" name="datasheet_gen" id="datasheet_'.$key['Instrument_no'].'" style="width:20px;"></a></td></tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th>Range</th><th>Make</th><th>ID No.</th><th>LC</th></tr></thead><tbody><tr>
				<td><label id="instru_range">'.$key['Instru_Range'].'</label></td>
				<td><label id="instru_make">'.$key['Make'].'</label></td>
				<td><label id="instru_idno">'.$key['ID_no'].'</label></td>
				<td><label id="instru_lc">'.$key['LC'].'</label></td>
				</tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th scope="col" class="calib_date">Date of Calibration</th><th scope="col" class="cert_id">Certificate ID</th><th scope="col" class="url_no">ULR NO.</th><th scope="col" class="calib_by">Calibrated By</th><th>Instrument ID</th><th scope="col" class="remark">Remark</th></tr></thead><tbody><tr>
				<td><label id="calib_date">'.$key['Date_Of_Calibration'].'</label></td>
				<td><label id="cert_id">'.$key['Certificate_ID'].'</label></td>
				<td><label id="ulr_no">'.$key['ULR_no'].'</label></td>
				<td><label id="calib_by">'.$key['Calibrated_By'].'</label></td>
				<td><label id="instrument_id">'.$key['Instrument_no'].'</label></td>
				<td><label id="remark">'.$key['Remark'].'</label></td>
				</tr></tbody></table></div>';
			break;
			case "Surface Plate" :
	
				echo '<div class="database_table"><table class="table table-bordered " id="insrument_add_table" style="text-align: center;"><tbody><tr><th scope="col" class="instrument_name" width="20%">Instrument Name</th>
				<td><label id="instrument_name">'.$key['Name'].'</label></td><td width="6%"><a><img src="img/award.png" class+"cert_gen" name="certificate_gen" id="'.$key['Instrument_no'].'" style="width:20px;"></a></td><td width="6%"><a><img src="img/table-grid.png" class="datasheet_gen" name="datasheet_gen" id="datasheet_'.$key['Instrument_no'].'" style="width:20px;"></a></td></tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th>Range</th><th>Make</th><th>ID No.</th><th>LC/GRD</th></tr></thead><tbody><tr>
				<td><label id="instru_range">'.$key['Instru_Range'].'</label></td>
				<td><label id="instru_make">'.$key['Make'].'</label></td>
				<td><label id="instru_idno">'.$key['ID_no'].'</label></td>
				<td><label id="instru_lc_grd">'.$key['LC_GRD'].'</label></td>
				</tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th scope="col" class="calib_date">Date of Calibration</th><th scope="col" class="cert_id">Certificate ID</th><th scope="col" class="url_no">ULR NO.</th><th scope="col" class="calib_by">Calibrated By</th><th>Instrument ID</th><th scope="col" class="remark">Remark</th></tr></thead><tbody><tr>
				<td><label id="calib_date">'.$key['Date_Of_Calibration'].'</label></td>
				<td><label id="cert_id">'.$key['Certificate_ID'].'</label></td>
				<td><label id="ulr_no">'.$key['ULR_no'].'</label></td>
				<td><label id="calib_by">'.$key['Calibrated_By'].'</label></td>
				<td><label id="instrument_id">'.$key['Instrument_no'].'</label></td>
				<td><label id="remark">'.$key['Remark'].'</label></td>
				</tr></tbody></table></div>';
			break;
			case "Dial Snap Gauge" :
			case "Dial Bore Gauge" :
			case "Caliper Checker" :
			echo '<div class="database_table"><table class="table table-bordered " id="insrument_add_table" style="text-align: center;"><tbody><tr><th scope="col" class="instrument_name" width="20%">Instrument Name</th>
				<td><label id="instrument_name">'.$key['Name'].'</label></td><td width="6%"><a><img src="img/award.png" class="cert_gen" name="certificate_gen" id="'.$key['Instrument_no'].'" style="width:20px;"></a></td><td width="6%"><a><img src="img/table-grid.png" class="datasheet_gen" name="datasheet_gen" id="datasheet_'.$key['Instrument_no'].'" style="width:20px;"></a></td></tr></tbody></table>
			<table class="table table-bordered"><thead style="text-align:center;"><tr><th>Range</th><th>Make</th><th>ID No.</th></tr></thead><tbody><tr>
			<td><label id="instru_range">'.$key['Instru_Range'].'</label></td>
			<td><label id="instru_make">'.$key['Make'].'</label></td>
			<td><label id="instru_idno">'.$key['ID_no'].'</label></td>
			</tr></tbody></table>
			<table class="table table-bordered"><thead style="text-align:center;"><tr><th scope="col" class="calib_date">Date of Calibration</th><th scope="col" class="cert_id">Certificate ID</th><th scope="col" class="url_no">ULR NO.</th><th scope="col" class="calib_by">Calibrated By</th><th>Instrument ID</th><th scope="col" class="remark">Remark</th></tr></thead><tbody><tr>
				<td><label id="calib_date">'.$key['Date_Of_Calibration'].'</label></td>
				<td><label id="cert_id">'.$key['Certificate_ID'].'</label></td>
				<td><label id="ulr_no">'.$key['ULR_no'].'</label></td>
				<td><label id="calib_by">'.$key['Calibrated_By'].'</label></td>
				<td><label id="instrument_id">'.$key['Instrument_no'].'</label></td>
				<td><label id="remark">'.$key['Remark'].'</label></td>
				</tr></tbody></table></div>';		
			break;

			case "Feeler Gauge" :
			echo '
			<div class="database_table"><table class="table table-bordered " id="insrument_add_table" style="text-align: center;"><tbody><tr><th scope="col" class="instrument_name" width="20%">Instrument Name</th>
				<td><label id="instrument_name">'.$key['Name'].'</label></td><td width="6%"><a><img src="img/award.png" class="cert_gen" name="certificate_gen" id="'.$key['Instrument_no'].'" style="width:20px;"></a></td><td width="6%"><a><img src="img/table-grid.png" class="datasheet_gen" name="datasheet_gen" id="datasheet_'.$key['Instrument_no'].'" style="width:20px;"></a></td></tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th>Range</th><th>Make</th><th>ID No.</th><th>Qty</th></tr></thead><tbody><tr>
				<td><input type="text" id="instru_range" name="instru_range" class="form-control"></td>
				<td><label id="instru_make">'.$key['Make'].'</label></td>
				<td><label id="instru_idno">'.$key['ID_no'].'</label></td>
				<td><label id="instru_qty">'.$key['Qty'].'</label></td>
				</tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th scope="col" class="calib_date">Date of Calibration</th><th scope="col" class="cert_id">Certificate ID</th><th scope="col" class="url_no">ULR NO.</th><th scope="col" class="calib_by">Calibrated By</th><th>Instrument ID</th><th scope="col" class="remark">Remark</th></tr></thead><tbody><tr>
				<td><label id="calib_date">'.$key['Date_Of_Calibration'].'</label></td>
				<td><label id="cert_id">'.$key['Certificate_ID'].'</label></td>
				<td><label id="ulr_no">'.$key['ULR_no'].'</label></td>
				<td><label id="calib_by">'.$key['Calibrated_By'].'</label></td>
				<td><label id="instrument_id">'.$key['Instrument_no'].'</label></td>
				<td><label id="remark">'.$key['Remark'].'</label></td>
				</tr></tbody></table></div>';
			break;
			default :
				echo '<div class="database_table"><table class="table table-bordered " id="insrument_add_table" style="text-align: center;"><tbody><tr><th scope="col" class="instrument_name" width="20%">Instrument Name</th>
				<td><label id="instrument_name">'.$key['Name'].'</label></td><td width="6%"><a><img src="img/award.png" class="cert_gen" name="certificate_gen" id="'.$key['Instrument_no'].'" style="width:20px;"></a></td><td width="6%"><a><img src="img/table-grid.png" class="datasheet_gen" name="datasheet_gen" id="datasheet_'.$key['Instrument_no'].'" style="width:20px;"></a></td></tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th>Size</th><th>Range</th><th>Make</th><th>ID No.</th><th>LC/GRD</th><th>LC</th><th>Qty</th></tr></thead><tbody><tr>
				<td><label id="instru_size">'.$key['Size'].'</label></td>
				<td><label id="instru_range">'.$key['Instru_Range'].'</label></td>
				<td><label id="instru_make">'.$key['Make'].'</label></td>
				<td><label id="instru_idno">'.$key['ID_no'].'</label></td>
				<td><label id="instru_lc_grd">'.$key['LC_GRD'].'</label></td>
				<td><label id="instru_lc">'.$key['LC'].'</label></td>
				<td><label id="instru_qty">'.$key['Qty'].'</label></td></tr></tbody></table>
				<table class="table table-bordered"><thead style="text-align:center;"><tr><th scope="col" class="calib_date">Date of Calibration</th><th scope="col" class="cert_id">Certificate ID</th><th scope="col" class="url_no">ULR NO.</th><th scope="col" class="calib_by">Calibrated By</th><th>Instrument ID</th><th scope="col" class="remark">Remark</th></tr></thead><tbody><tr>
				<td><label id="calib_date">'.$key['Date_Of_Calibration'].'</label></td>
				<td><label id="cert_id">'.$key['Certificate_ID'].'</label></td>
				<td><label id="ulr_no">'.$key['ULR_no'].'</label></td>
				<td><label id="calib_by">'.$key['Calibrated_By'].'</label></td>
				<td><label id="instrument_id">'.$key['Instrument_no'].'</label></td>
				<td><label id="remark">'.$key['Remark'].'</label></td>
				</tr></tbody></table></div>';
		}



     ?>
<?php
}

?>
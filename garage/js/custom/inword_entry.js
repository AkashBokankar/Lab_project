i = 0;
$(document).ready(function() {
	$('#add_instru_btn').prop('disabled', true);

$.post('model/inword_entry.php',function(data){
				
					$('.panel').html(data);
					$('.nav_name').on('click',function(){
						// location.reload();
					$('form[name="inword_entryForm"]')[0].reset();
					$('#add_instru_btn').prop('disabled', false);
					$a_name = $(this).find('.client_name').text();
					$('#inword_name').val($a_name);
					$lab_id = $(this).find('.lab_id').text();
					$('#inword_labid').val($lab_id);
					$address = $(this).find('.client_address').text();
					$('#inword_address').val($address);
					$challan_no = $(this).find('.challan_no').text();
					$('#inword_challan_number').val($challan_no);
					$challan_date = $(this).find('.challan_date').text();
					$('#inword_challan_date').val($challan_date);
					$plan_date = $(this).find('.plan_date').text();
					$('#inword_plan_delivery_date').val($plan_date);
					var current_labid = $('#inword_labid').val();
						$.post('model/inword_instru_list.php',{current_labid:current_labid},function(data){
							$('.aftersave').html(data);
							var count = $('.database_table').length;
							i = count++;
						});
					 $('.main_table').remove();
					
				});
				
				});

$('#add_instru_btn').on('click',function(){
	 i++;
	$('.insrument_add_section').append('<div class="instruadd_table"><table class="table table-bordered " id="insrument_add_table" style="text-align: center;"><thead><tr><th scope="col" class="instrument_name">Instrument Name</th></tr></thead><tbody><tr><td width="30%"><select class="select inword_select form-control selectpicker" data-live-search="true" name="instrument_name" id="instrument_name"></select></td></tr></tbody></table></div><div class="stat_table"><table class="table table-bordered"><thead style="text-align:center;"><tr><th scope="col" class="calib_date">Date of Calibration</th><th scope="col" class="cert_id">Certificate ID</th><th scope="col" class="url_no">ULR NO.</th><th scope="col" class="calib_by">Calibrated By</th><th>Instrument ID</th><th scope="col" class="remark">Remark</th></tr></thead><tbody><tr><td><input type="Date" id="calib_date" name="calib_date" class="form-control"></td><td><input type="text" id="cert_id" name="cert_id" class="form-control" readonly></td><td><input type="text" id="ulr_no" name="ulr_no" class="form-control" readonly></td><td><input type="text" id="calib_by" name="calib_by" class="form-control"></td><td><input type="text" id="instrument_id" name="instrument_id" class="form-control" readonly></td><td><input type="text" id="remark" name="remark" class="form-control"></td></tr></tbody></table><button type="submit" id="save"  class="save btn btn-primary">Save</button></div>');
	var current_id = $('#inword_labid').val();

	var dis = current_id+'/'+i;
	var instrument_id = $('#instrument_id').val(dis);
	$.post('model/inword_instrument.php',{current_id:current_id},function(data){
		$('.inword_select').html(data);
		$('.inword_select').on('change',function(){
			$current_val = $('#instrument_name').val();
		switch($current_val)
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
				$('.dynamic_table').remove();
				$('.instruadd_table').append('<table class="table table-bordered dynamic_table"><thead style="text-align:center;"><tr><th>Size</th><th>Make</th><th>ID No.</th></tr></thead><tbody><tr><td><input type="text" id="instru_size" name="instru_size" class="form-control"></td><td><input type="text" id="instru_make" name="instru_make" class="form-control"></td><td><input type="text" id="instru_idno" name="instru_idno" class="form-control"></td></tr></tbody></table>');
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
				$('.dynamic_table').remove();
				$('.instruadd_table').append('<table class="table table-bordered dynamic_table"><thead style="text-align:center;"><tr><th>Range</th><th>Make</th><th>ID No.</th><th>LC</th></tr></thead><tbody><tr><td><input type="text" id="instru_range" name="instru_range" class="form-control"></td><td><input type="text" id="instru_make" name="instru_make" class="form-control"></td><td><input type="text" id="instru_idno" name="instru_idno" class="form-control"></td><td><input type="text" id="instru_lc" name="instru_lc" class="form-control"></td></tr></tbody></table>');
			break;
			case "Surface Plate" :
				$('.dynamic_table').remove();
				$('.instruadd_table').append('<table class="table table-bordered dynamic_table"><thead style="text-align:center;"><tr><th>Range</th><th>Make</th><th>ID No.</th><th>LC/GRD</th></tr></thead><tbody><tr><td><input type="text" id="instru_range" name="instru_range" class="form-control"></td><td><input type="text" id="instru_make" name="instru_make" class="form-control"></td><td><input type="text" id="instru_idno" name="instru_idno" class="form-control"></td><td><input type="text" id="instru_lc_grd" name="instru_lc_grd" class="form-control"></td></tr></tbody></table>');
			break;
			case "Dial Snap Gauge" :
			case "Dial Bore Gauge" :
			case "Caliper Checker" :
				$('.dynamic_table').remove();
				$('.instruadd_table').append('<table class="table table-bordered dynamic_table"><thead style="text-align:center;"><tr><th>Range</th><th>Make</th><th>ID No.</th></tr></thead><tbody><tr><td><input type="text" id="instru_range" name="instru_range" class="form-control"></td><td><input type="text" id="instru_make" name="instru_make" class="form-control"></td><td><input type="text" id="instru_idno" name="instru_idno" class="form-control"></td></tr></tbody></table>');				
			break;

			case "Feeler Gauge" :
				$('.dynamic_table').remove();
				$('.instruadd_table').append('<table class="table table-bordered dynamic_table"><thead style="text-align:center;"><tr><th>Range</th><th>Make</th><th>ID No.</th><th>Qty</th></tr></thead><tbody><tr><td><input type="text" id="instru_range" name="instru_range" class="form-control"></td><td><input type="text" id="instru_make" name="instru_make" class="form-control"></td><td><input type="text" id="instru_idno" name="instru_idno" class="form-control"></td><td><input type="text" id="instru_qty" class="form-control"></td></tr></tbody></table>');
			break;
			default :
				$('.dynamic_table').remove();
				$('.instruadd_table').append('<table class="table table-bordered dynamic_table"><thead style="text-align:center;"><tr><th>Size</th><th>Range</th><th>Make</th><th>ID No.</th><th>LC/GRD</th><th>LC</th><th>Qty</th></tr></thead><tbody><tr><td><input type="text" id="instru_size" name="instru_size" class="form-control"></td><td><input type="text" id="instru_range" name="instru_range" class="form-control"></td><td><input type="text" id="instru_make" name="instru_make" class="form-control"></td><td><input type="text" id="instru_idno" name="instru_idno" class="form-control"></td><td><input type="text" id="instru_lc_grd" name="instru_lc_grd" class="form-control"></td><td><input type="text" id="instru_lc" name="instru_lc" class="form-control"></td><td><input type="text" id="instru_qty" name="instru_qty" class="form-control"></td></tr></tbody></table>');
		}

		});

	});

	
});
	
	 

  });
$(document).ready(function()
{

	$('#updatemrf').on('click', function(event)
	{
	event.preventDefault();
$namedis = $('#namedis').val();
$Cl_address = $('#Cl_address').val();
$challan_no = $('#challan_no').val();
$challan_date = $('#challan_date').val();
$receipt_date = $('#receipt_date').val();
$nabl_cert = $('#nabl_cert').val();
$item_condition = $('#item_condition').val();
$plan_date = $('#plan_date').val();
$item_due = $('#item_due').val();
$report_name = $('#report_name').val();
$special_inst_calib = $('#special_inst_calib').val();
$payment_mode = $('#payment_mode').val();
$est_cal_charges = $('#est_cal_charges').val();
$other_charges = $('#other_charges').val();
$lab_id = $('#lab_id').val();
$date = $('#date').val();
$delivery_mode = $('#delivery_mode').val();



// $.each(, function(index, namekey) {
	// if ($namekey == "") {
		// alert("Some Instrument name fields are blank");
	// }
// });
// $.each($('#instru_qty').val(), function(index1, $qtykey) {
// 	if ($qtykey == "") {
// 		alert("Some Instrument Quantity fields are blank");
// 	}
// });

		// ajax call to register
		$.ajax({
					url: 'model/update.php',
					type: 'POST',
					dataType: 'JSON',
					data: $('form[name="mrfForm"]').serialize(),
				}).
				done(function(data){
					console.log(data);
					
					if(data.status == "success"){
						// alert(data.id);
						$.notify({
						  // where to append the toast notification
						  wrapper: 'body',
						  // toast message
						  message: 'Updated Successful',
						  			
						  // success, info, error, warn
						  type: 'success',
						  // 1: top-left, 2: top-center, 3: top-right
						  // 4: mid-left, 5: mid-right
						  // 6: bottom-left, 7: bottom-center, 8: bottom-right
						  position: 2,
						  // or 'rtl'
						   // dir: 'ltr',
						  // enable/disable auto close
						  autoClose: true,
						  // timeout in milliseconds
						  duration: 5000
						});
						$('#editmrf').prop('disabled', false);
						$('#printmrf').prop('disabled', false);
						$('#submitmrf').css({'display':'block'});
						$('#updatemrf').css({'display':'none'});
						$('#resetmrf').prop('disabled', true);
						$('#mrff input,#nabl_cert,#payment_mode,#delivery_mode,#mrff textarea').prop('readonly', true);
					}    
					else{
						alert(data.error);
					}

					
				});

	})
	

});
	$('#printmrf').on('click', function(){
						$('input,#nabl_cert,#payment_mode,#delivery_mode,textarea').addClass("stylecls");
								 $('body').append('<div class="container footer" ><div class="row printsec"style="border-top: 2px solid black;" ><div class="col-md-6"><h5>For Microcal Calibration Laboratory</h5><br><br><br><br><br><label>Authorized Signatory</label></div><div class="col-md-6" style="border-left: 2px solid black;"><h5>Customer representative</h5><br><br><label>Name:</label><br><label>Designation:</label><br><label>Signature:</label><br></div></div><div class="line" style="border-top: 2px solid black;"></div><br><div class="col-md-12 footersec" ><h5>Microcal (Calibration Laboratory) Pl.No.P-66 Bajaj Nagar MIDC, Waluj, Aurangabad.</h5><label>Document Name: Material Receiving Form</label> <table class="table table-bordered style="text-align: left;"> <thead> <tr><th scope="col" colspan="2">Document No /MC/RCD/02</th><th scope="col">Copy No:</th><th scope="col">Section No:</th><th scope="col">Page 1 of 1</th></tr></thead><tbody><tr><td>Issue No:01</td><td>Date 01.08.18</td><td rowspan="2">Prepared By<br>(Q.M)</td><td rowspan="2">Approved By<br>(Q.M)</td><td rowspan="2">Issued By<br>(Q.M)</td></tr><tr><td>Amend No:</td><td>Date</td></tr></tbody></table></div></div>');
								$('select').css({'-webkit-appearance':'none'});
								$('#container').removeClass("container-class");
								// .css({'border-top:':'none','border-radius': '0px'});
								window.print();
								$('#mrff input,#nabl_cert,#payment_mode,#delivery_mode,#mrff textarea').removeClass("stylecls");
								$('#container').addClass("container-class");
								$('.printsec').remove();
								$('.footer').remove();
					});


$(document).ready(function()
{
	$('#editmrf').prop('disabled', true);
	// $('#printmrf').prop('disabled', true);


	$('form[name="mrfForm"]').on('submit', function(event)
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


		
/*if ($namedis == "") {
		alert("Enter Client name");
	}

if ($lab_id == "") {
	alert("generate lab id");
}*/

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
					url: 'model/mrf.php',
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
						  message: 'Successful',
						  			
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
						var lab_id = data.lab_id;
						$('#lab_id').val(lab_id);
						$('#editmrf').prop('disabled', false);
						$('#printmrf').prop('disabled', false);
						$('#submitmrf').prop('disabled', true);
						$('#resetmrf').prop('disabled', true);
						$('#mrff input,#nabl_cert,#payment_mode,#delivery_mode,#mrff textarea').prop('readonly', true);
					}    
					else{
						alert(data.error);
					}

					
				});

	})
	$('#editmrf').on('click', function(){

						$('#editmrf').prop('disabled', true);
						$('#printmrf').prop('disabled', true);
						$('#submitmrf').css({'display':'none'});
						$('#updatemrf').css({'display':'block'});
						$('#resetmrf').prop('disabled', true);
						$('#mrff input,#nabl_cert,#payment_mode,#delivery_mode,#mrff textarea').prop('readonly', false);

});
			

});

	
	$('#printmrf').on('click', function(){
						$('input,#nabl_cert,#payment_mode,#delivery_mode,textarea').addClass("stylecls");
								 // $('body').append('<div class="container footer" ><div class="row printsec"style="border-top: 2px solid black;" ><div class="col-md-6"><h5>For Microcal Calibration Laboratory</h5><br><br><br><br><br><label>Authorized Signatory</label></div><div class="col-md-6" style="border-left: 2px solid black;"><h5>Customer representative</h5><br><br><label>Name:</label><br><label>Designation:</label><br><label>Signature:</label><br></div></div><div class="line" style="border-top: 2px solid black;"></div><br><div class="col-md-12 footersec" ><h5>Microcal (Calibration Laboratory) Pl.No.P-66 Bajaj Nagar MIDC, Waluj, Aurangabad.</h5><label>Document Name: Material Receiving Form</label> <table class="table table-bordered style="text-align: left;"> <thead> <tr><th scope="col" colspan="2">Document No /MC/RCD/02</th><th scope="col">Copy No:</th><th scope="col">Section No:</th><th scope="col">Page 1 of 1</th></tr></thead><tbody><tr><td>Issue No:01</td><td>Date 01.08.18</td><td rowspan="2">Prepared By<br>(Q.M)</td><td rowspan="2">Approved By<br>(Q.M)</td><td rowspan="2">Issued By<br>(Q.M)</td></tr><tr><td>Amend No:</td><td>Date</td></tr></tbody></table></div></div>');
								  $('.header_img').css({'display':'block'});
								$('select').css({'-webkit-appearance':'none'});
								$('#container').removeClass("container-class");
								// .css({'border-top:':'none','border-radius': '0px'});
								window.print();
								$('.header_img').remove();
								$('#jobcard input,#jobcard textarea').removeClass("stylecls");
								$('#container').addClass("container-class");
								
					});


$(document).ready(function()
{
	$('#editmrf').prop('disabled', true);
	// $('#printmrf').prop('disabled', true);
var date = new Date();

        var val=date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear();
         $('#date').val(val);     
	$('form[name="jobcardForm"]').on('submit', function(event)
	{



		event.preventDefault();

		
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
					url: 'model/jobcard.php',
					type: 'POST',
					dataType: 'JSON',
					data: $('form[name="jobcardForm"]').serialize(),
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
						var jobcard_id = data.jobcard_id;
						$('#jobcard_id').val(jobcard_id);
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

	
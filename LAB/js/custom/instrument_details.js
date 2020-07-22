	$('#print_inword').on('click', function(){
						$('input,textarea').addClass("stylecls");
						
								 // $('body').append('<div class="container footer" ><div class="row printsec"style="border-top: 2px solid black;" ><div class="col-md-6"><h5>For Microcal Calibration Laboratory</h5><br><br><br><br><br><label>Authorized Signatory</label></div><div class="col-md-6" style="border-left: 2px solid black;"><h5>Customer representative</h5><br><br><label>Name:</label><br><label>Designation:</label><br><label>Signature:</label><br></div></div><div class="line" style="border-top: 2px solid black;"></div><br><div class="col-md-12 footersec" ><h5>Microcal (Calibration Laboratory) Pl.No.P-66 Bajaj Nagar MIDC, Waluj, Aurangabad.</h5><label>Document Name: Material Receiving Form</label> <table class="table table-bordered style="text-align: left;"> <thead> <tr><th scope="col" colspan="2">Document No /MC/RCD/02</th><th scope="col">Copy No:</th><th scope="col">Section No:</th><th scope="col">Page 1 of 1</th></tr></thead><tbody><tr><td>Issue No:01</td><td>Date 01.08.18</td><td rowspan="2">Prepared By<br>(Q.M)</td><td rowspan="2">Approved By<br>(Q.M)</td><td rowspan="2">Issued By<br>(Q.M)</td></tr><tr><td>Amend No:</td><td>Date</td></tr></tbody></table></div></div>');
								// $('select').css({'-webkit-appearance':'none'});
								$('#container').removeClass("container-class");
								$('.colcls').removeClass("col-md-10").addClass('col-md-12');
								
								// .css({'border-top:':'none','border-radius': '0px'});
								window.print();
								$('input, textarea').removeClass("stylecls");
								$('#container').addClass("container-class");
								$('.colcls').removeClass("col-md-12").addClass('col-md-10');
				
								// $('.printsec').remove();
								// $('.footer').remove();
					});

$(document).ready(function()
{
	

	$('form[name="inword_entryForm"]').on('submit', function(event)
	{
		event.preventDefault();
		

		// ajax call to register
		$.ajax({
					url: 'model/inword_details.php',
					type: 'POST',
					dataType: 'JSON',
					data: $('form[name="inword_entryForm"]').serialize(),
				}).
				done(function(data){
					// console.log(data);
					
					if(data.status == "success"){
						// alert(data.id);
						$.notify({
						  // where to append the toast notification
						  wrapper: 'body',
						  // toast message
						  message: 'Successfull',
						  			
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
						// $('form[name="customerForm"]')[0].reset();
						// $send = $('.insrument_add_section').clone();
									$('#save').remove(); 
									var ulr_no = "CC26861800000"+data.url_series+"F";
									var cert_id = data.cert_id;
									$('#cert_id').val(cert_id);
									$('#ulr_no').val(ulr_no);
									var send = $('.insrument_add_section').clone();
						            var selectedValue = $(".insrument_add_section option:selected").val();
            						send.find("option[value = '" + selectedValue + "']").attr("selected", "selected");
										
									send.find('.dynamic_table').removeClass("dynamic_table").addClass("mid_table");
									send.find('.stat_table').removeClass("stat_table").addClass("s_table");
									send.find('.instruadd_table').removeClass("instruadd_table").addClass("first_table");
														
						$('.aftersave').append(send);
					$('.aftersave').find('.insrument_add_section').removeClass("insrument_add_section").addClass("main_table");
					$('.main_table').css({'border-bottom':'2px solid black'});
					$('.aftersave select').replaceWith(function(){

            				return $('<div>'+selectedValue+'</div>');
            			});		
            			$('.aftersave input').replaceWith(function() {
    					return $('<div>' + $(this).val() + '</div>');
						});	
						$('.instruadd_table, .stat_table').remove();
						// $('#add_instru_btn').prop('disabled', true);
															
					}
					
					if (data.status == "fail"){
						// alert(data.error);
							$.notify({
						  // where to append the toast notification
						  wrapper: 'body',
						  // toast message
						  message: 'ERROR:This Instrument Already Exists',
						  			
						  // success, info, error, warn
						  type: 'error',
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
					}
					
				});
	});
});
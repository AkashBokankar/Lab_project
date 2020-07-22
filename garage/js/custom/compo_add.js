$(document).ready(function()
{
	

	$('form[name="componentForm"]').on('submit', function(event)
	{
		event.preventDefault();
		
var gst = $('#gst').val();
	var compo_cost = $('#comp_cost').val();
	var hun = 100;
	var total_cost = compo_cost * gst;
	 var sec = total_cost/ hun;
	 var thir = parseInt(sec, 10) + parseInt(compo_cost, 10);
	$('#t_c_cost').val(thir);

		// ajax call to register
		$.ajax({
					url: 'model/compo_add.php',
					type: 'POST',
					dataType: 'JSON',
					data: $('form[name="componentForm"]').serialize(),
				}).
				done(function(data){
					console.log(data);
					
					if(data.status == "success"){
						// alert(data.id);
						$.notify({
						  // where to append the toast notification
						  wrapper: 'body',
						  // toast message
						  message: 'Component Added Successfully',
						  			
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
						$('form[name="componentForm"]')[0].reset();
					}
					else{
						alert(data.error);
					}

					
				});

	})
});
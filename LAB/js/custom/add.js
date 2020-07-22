$(document).ready(function()
{
	

	$('form[name="customerForm"]').on('submit', function(event)
	{
		event.preventDefault();
		

		// ajax call to register
		$.ajax({
					url: 'model/add.php',
					type: 'POST',
					dataType: 'JSON',
					data: $('form[name="customerForm"]').serialize(),
				}).
				done(function(data){
					console.log(data);
					
					if(data.status == "success"){
						// alert(data.id);
						$.notify({
						  // where to append the toast notification
						  wrapper: 'body',
						  // toast message
						  message: 'Client Added Successfully',
						  			
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
						$('form[name="customerForm"]')[0].reset();
					}
					else{
						alert(data.error);
					}

					
				});

	})
});
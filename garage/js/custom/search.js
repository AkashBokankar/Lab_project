  $(document).ready(function(){
    $('#Search').keyup(function(){
        var regno = $(this).val();
        if (regno == '') {
$('.display').hide();
        }else{

$.post('model/search.php', {regno:regno},function(data){
 
           $('.display').html(data);

           $('.display').css({'display':'block'});

       $('.search_result').click(function(){
		   // $('#Search').hide();
     
      var current_regno = $(this).find('.search_regno').text();
    	var current_vehical =$(this).find('.search_vehical_name').text();
         var current_person = $(this).find('.search_contact_person').text();
      var current_contactno =$(this).find('.search_contact_no').text();
         var current_addr = $(this).find('.search_address').text();
// $('#regdis').css({'display':'block'});
		$('#Search').val(current_regno);
    $('#vehical_name').val(current_vehical);
    $('#namedis').val(current_person);
    $('#mobile_no').val(current_contactno);
    
    	$('#Cl_address').val(current_addr);
    
    	$('.display').hide();
    	$('#historygarage').click(function(){
       var history = $('#Search').val();
       $('#history_title').html(history);
    $.post('model/history_date.php', {history:history},function(data){
      $('.date').html(data);
   
      $('.job_date').click(function(){
        var selected_date = $(this).text();
         $.post('model/history_data.php', {selected_date:selected_date, history:history},function(data){
      $('.details').html(data);
});
     /*   var details = $('.ServiceDetails').text();
   
           $('.details').html(details);
       
      
        var amount = $('.Amount').text();
       $('.amount').text(amount); */
      });

    });
    	});
   
    });
          

        });

        }
       
        
    });



  });
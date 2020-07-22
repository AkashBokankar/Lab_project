  $(document).ready(function(){
    $('#Search').keyup(function(){
        var name = $(this).val();
        if (name == '') {
$('.display').hide();
        }else{

$.post('model/search.php', {name:name},function(data){
 
           $('.display').html(data);

           $('.display').css({'display':'block'});

       $('.search_result').click(function(){
		   $('#Search').hide();
     
      var current_addr = $(this).find('.search_address').text();
    	var current_name =$(this).find('.search_name').text();
$('#namedis').css({'display':'block'});
		$('#namedis').val(current_name);
    
    	$('#Cl_address').val(current_addr);
    
    	$('.display').hide();
    	$('#namedis').click(function(){
    		$('#Search').css({'display':'block'});	
    		$('#namedis').css({'display':'none'});
    	})
   
    });
          

        });

        }
       
        
    });



  });
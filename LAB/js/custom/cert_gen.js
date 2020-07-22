  $(document).ready(function(){
    $('.cert_gen').click(function(){
        var cert_id =  $(this).attr('id');

$.post('model/cert_gen.php', {cert_id:cert_id},function(data){
 
             $('.aftersave').html(data);


        });

        });
       
        
    });




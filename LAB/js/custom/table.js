
  
   $(document).ready(function(){  
      var i=0;  
      if (i==0) {
        $('#dynamic_field').append('<tr id="msg"><td colspan="4">Click add to insert instrument</td>');

      }
      $('#addtab').click(function(){  
           i++;  
           $('#msg').css({'display':'none'});
           $('#dynamic_field').append('<tr id="row'+i+'"><td class="srno" style="display:none;" width="10%">'+i+'</td><td><input type="text" class="form-control ins_name" name="instru_name['+i+']" id="instru_name'+i+'" ></td><td width="10%"><input type="text" class="form-control ins_qty" name="instru_qty['+i+']" id="instru_qty'+i+'[]"></td>  <td class="d-print-none" width="5%"><a><img src="img/baseline_delete_black_18dp.png" name="remove" id="'+i+'" class="removebtn"></a></td></tr>');  
                     $(document).on('keyup','.ins_name',function(){
            var instrument = $(this).attr('id');
        var instru_name = $(this).val();
        if (instru_name == '') {
$('.instru_display').hide();
        }else{

   $.post('model/instru_search.php', {instru_name:instru_name},function(data){   
       $('.instru_display').html(data);
       $('.instru_display').css({'display':'block'});
       $('.search_instruresult').click(function(){  
        var current_name =$(this).find('.search_instruname').text();
       $("input[id="+instrument+"]").val(current_name);
       $('.instru_display').hide();
         });
   });
 }
});
   

      });  



      $(document).on('click', '.removebtn', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  




    });
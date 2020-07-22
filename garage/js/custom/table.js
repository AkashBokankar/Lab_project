
  
   $(document).ready(function(){  
      var i=0;  
      if (i==0) {
        $('#dynamic_field').append('<tr id="msg"><td colspan="4">Click add to insert Details</td>');

      }
      $('#addtab').click(function(){  
           i++;  
           $('#msg').css({'display':'none'});
           $('#dynamic_field').append('<tr id="row'+i+'" name="'+i+'"><td class="srno" style="display:none;" width="10%">'+i+'</td><td><input type="text" class="form-control ins_name" name="instru_name['+i+']" id="instru_name'+i+'" ></td><td width="10%"><input type="text" class="form-control ins_amount" name="amount['+i+']" id="amount_instru_name'+i+'"></td><td width="10%"><input type="text" class="form-control ins_qty" name="instru_qty['+i+']" id="'+i+'"></td>  <td class="d-print-none" width="5%"><img src="img/baseline_delete_black_18dp.png" name="remove" id="'+i+'" class="removebtn"></td></tr>');  
                           

  
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
          var current_amount =$(this).find('.search_instrucost').text();
       $("input[id="+instrument+"]").val(current_name);
        $("input[id=amount_"+instrument+"]").val(current_amount);
       $('.instru_display').hide();
         });

   });
 }
});
   

      });  

        //     $(document).on('keyup','.ins_amount',function(){
        //           event.preventDefault();
                  
        //     window.instrument_cost = $(this).attr('id');
        // window.instru_cost = $('#'+instrument_cost+'').val();
        //  });
             $(document).on('keyup','.ins_qty',function(){
                event.preventDefault();
                 // var row = $(this).find('.tr').attr('name');

            window.instrument_qty = $(this).attr('id');
           window.instru_cost = $('#amount_instru_name'+instrument_qty+'').val();
         window.qty = $('#'+instrument_qty+'').val();
        var total = parseInt(qty, 10)*parseInt(instru_cost, 10);
        var final = $('#total').val();
        if (final == "") {
          final = 0;
        }
        var final_total = total + parseInt(final, 10);
        // if (final_total == "NaN") {
        //   final_total = 0;
        // }
        $('#total').val(final_total);

     
    });

      $(document).on('click', '.removebtn', function(){  
           var button_id = $(this).attr("id");   
           
           var del_amount = $('#amount_instru_name'+button_id+'').val();
           var del_qty = $('#'+button_id+'').val();
           var del_total = $('#total').val();
           var del_mul = parseInt(del_amount, 10)*parseInt(del_qty);
           var del_final = del_total - parseInt(del_mul);
           $('#total').val(del_final);
           $('#row'+button_id+'').remove(); 
      });  




    });
$(document).ready(function(){

  

  $( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#close").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

   $(".from_date").datepicker({
      showOn: 'button',
      showAnim: 'slideDown',
      //dateFormat: "dd-mm-yy",
      dateFormat: 'dd-mm-yy',
      minDate: 0,
      changeMonth: true,
      changeYear: true
   });

   
  
 $('.to_date').datepicker({
                showOn: 'button',
                showAnim: 'slideDown',
                //dateFormat: "dd-mm-yy",
                dateFormat: 'dd-mm-yy',
                minDate: 0,
                changeMonth: true,
                changeYear: true
            });

            

$(document).on('change', '.to_date', function(){
   /* var startDate= $("#from_date").datepicker('getDate');
    var endDate= $("#to_date").datepicker('getDate');

    var startDay = new Date(startDate);  
    var endDay = new Date(endDate);  


var millisBetween = startDay.getTime() - endDay.getTime(); 

var days = millisBetween / (1000 * 3600 * 24) ;   

var diffInDays = Math.round((endDate.getTime() - startDate.getTime())/(1000 * 60 * 60 * 24));
alert(millisBetween);

$('#no_of_days').val(Math.round(Math.abs(days)));*/

 var startDate= $("#from_date").datepicker('getDate');
 var endDate= $("#to_date").datepicker('getDate'); 
 
 var startDay = new Date(startDate);  
 var endDay = new Date(endDate);  


var time_difference  = endDay.getTime() - startDay.getTime(); 

var days_difference = time_difference / (1000 * 60 * 60 * 24);  

var days = days_difference + 1;

//alert(days);

$('#no_of_days').val(Math.round(Math.abs(days)));
 

 });
   
   $('#employee_detail_leaves_search_submit').on('click',function(){
            var _token = $('#token').val();
            $value = $('#search').val();
            $.ajax({
               type:'GET',
               url:'/employee_detail_leaves',
               data:{'search':$value,_token:_token},
               success: function(data){
                console.log(data);
               }
            });
   });      

   $('#employee_detail_leaves_create_record').click(function(){
  	//alert('hi');
    
    $('#leave_status').val('waiting for apporval');
  	$('.modal-title').text('ADD NEW RECORD');
  	$('#employee_detail_leaves_action_button').val('ADD');
  	$('#employee_detail_leaves_action').val('ADD');
  	$('#employee_detail_leaves_form_Modal').modal('show');

  });

   $('#employee_detail_leaves_form').on('click','#employee_detail_leaves_action_button',function(e){
   	   e.preventDefault();
   	   
   	   if($('#employee_detail_leaves_action').val()=='ADD'){
 //alert("ADD VALUE");
 //return true;
   	   		$.ajax({
   	   			url:'/employee_detail_leaves_add',
   	   			method:'POST',
   	   			data:$('#employee_detail_leaves_form').serialize(),
   	   			dataType:"json",
   	   			success:function(data)
              {
               var html = '';
                  if(data.errors){
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++){
                      html += '<p>' + data.errors[count] + '</p>';
                      }
                      html += '</div>';
                    }
                    if(data.success){
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#employee_detail_leaves_form')[0].reset();
                    location.reload();
                  }
                  $('#employee_detail_leaves_form_result').html(html);
              }
   	   		});
   	   }

   	   if($('#employee_detail_leaves_action').val()=='EDIT'){
          //alert("edit");
          //return;
           
          $.ajax({
          		url:'/employee_detail_leaves_update',
   	   			method:'POST',
   	   			data:$('#employee_detail_leaves_form').serialize(),
   	   			dataType:"json",
           success:function(data)
              {
               var html = '';
                  if(data.errors){
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++){
                      html += '<p>' + data.errors[count] + '</p>';
                      }
                      html += '</div>';
                    }
                    if(data.success){
                    html = '<div class="alert alert-success">' + data.success + '</div>';
                    $('#employee_detail_leaves_form')[0].reset();
                    location.reload();
                  }
                  $('#employee_detail_leaves_form_result').html(html);
              }

      });

        }

   });
   
   $(document).on('click', '.edit', function(){ 

    
    	/*alert('edit');
   		return;*/
   		var id = $(this).attr('id');

      //var first_name = $("#leave_status").val();
     /*$("input[type='text']").each(function () {  
  
                    alert($(this).val());  
                }) ;
      */

      
      //alert($('#leave_status').val());
     
     //var status = $('#leave_status').find('option:selected').attr('value');
     //var status =$("#leave_status option:selected").text();
     // alert(status);
     
    /*  if($("leave_status").val('waiting for apporval')){

        
        $("select[name=leave_type]").prop('disabled', false);
        $('#from_date').prop('disabled', false);
          $('#to_date').prop('disabled', false);
          //$('#to_date').stop().slideDown();
          $("#to_date").not(":animated").slideDown();
          $(".ui-datepicker-trigger").prop('disabled', false);
         
          $('#no_of_days').prop('disabled', false);
          //$("select[name=leave_status]").prop('disabled', false);
          
        //$(':input[type="submit"]').prop('disabled', true);
        $('#employee_detail_leaves_action_button').prop('disabled', false);
      
      }*/
     
   		$('#employee_detail_leaves_form_result').html('');

   		$.ajax({
   			url:'/employee_detail_leaves_edit/'+id,
   			dataType:"json",
   			success:function(html){ 
   				$('#employee_name').val(html.data.employee_name);
          $('#from_date').val(html.data.from_date);
          $('#to_date').val(html.data.to_date);
          $("select[name=leave_type]").val(html.data.leave_type);
          $('#no_of_days').val(html.data.no_of_days);
          
          $("#leave_status").val(html.data.leave_status);
          //$("select[name=leave_status]").val(html.data.leave_status);

          $('#leave_type').append("<input type='hidden' name='hidden_leave_type' value='"+html.data.leave_type+"' />");
           //$('#leave_status').append("<input type='hidden' name='hidden_leave_status' value='"+html.data.leave_status+"' />");
         
   				$('#hidden_id').val(html.data.id);
          $('#hidden_leave_type').val(html.data.leave_type);
          $('#hidden_leave_status').val(html.data.leave_status);
          
   				$('.modal-title').text("EDIT THE RECORD");
			    $(".modal-body").removeClass('bg-primary').addClass('bg-success');
			    $(".modal-header").removeClass('bg-danger').addClass('bg-primary');
			    $(".modal-footer").removeClass('bg-danger').addClass('bg-primary');
			    $('#employee_detail_leaves_action_button').val("EDIT");
			    $('#employee_detail_leaves_action').val("EDIT");
			    $('#employee_detail_leaves_action_button').removeClass('btn btn-primary').addClass('btn btn-warning');
			    $('#close').removeClass('btn btn-secondary').addClass('btn btn-success');
			    $('#employee_detail_leaves_form_Modal').modal('show');
   			}
   		});


   });


   var employee_detail_leaves_view_id;

    $(document).on('click', '.view', function(){
      employee_detail_leaves_view_id = $(this).attr('id');
      $('#employee_detail_leaves_view_Modal').modal('show');      
   });


  var employee_detail_leaves_id;
  $(document).on('click', '.delete', function(){
      employee_detail_leaves_id = $(this).attr('id');
      $('#employee_detail_leaves_confirm_Modal').modal('show');      
  });

  $('#employee_detail_leaves_ok_button').click(function(){
        $.ajax({
          url:'/employee_detail_leaves_delete/'+employee_detail_leaves_id,
          beforeSend:function(){
            $('#employee_detail_leaves_ok_button').text('Deleting.....');
            },
            success:function(data){
              setTimeout(function(){
                $('employee_detail_leaves_confirm_Modal').modal('hide');
                location.reload();
              }, 2000);
            }
        });
  });


  



	
});
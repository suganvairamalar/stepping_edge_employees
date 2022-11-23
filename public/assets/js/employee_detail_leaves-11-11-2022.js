$(document).ready(function(){

  $( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
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

            /*$('.datepicker').datepicker({
                dateFormat: 'dd-mm-yy',
                changeMonth: true,
                changeYear: true,
            });*/

$(document).on('change', '.to_date', function(){
      var startDate= $("#from_date").datepicker('getDate');
var endDate= $("#to_date").datepicker('getDate');

var diffInDays = Math.round((endDate.getTime()- startDate.getTime())/(1000*60*60*24));
//alert(diffInDays);

$('#no_of_days').val(diffInDays);
 });
 
   /* $(document).on('change', '.to_date', function(){
      var fromdate = $("#from_date").val();
      var todate = $("#to_date").val();
 
      if ((fromdate == "") || (todate == "")) {
        $("#result").html("Please enter two dates");
        return false
      }
 
      var dt1 = new Date(fromdate);
      var dt2 = new Date(todate);

 
      var time_difference = dt2.getTime() - dt1.getTime();
      var result = time_difference / (24 * 3600 * 1000);

      var res = Math.abs(dt1 - dt2) / 1000; 
      var days = Math.floor(res / 86400); 
 
      var output = "Total number of days between dates - " + result;
      //alert(output);
      $("#result").html(output);
      $('#no_of_days').val(result);

    });*/

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



  
/*  let $fromDate = $('#from_date'),
    $toDate = $('#to_date'),
    $numberDays = $('#no_of_days');

  $fromDate.datepicker({
  
    beforeShowDay: $.datepicker.noWeekends
  }).on('change', function(){
  
    $toDate.datepicker('option', 'minDate', $(this).val());
    
    $numberDays.val(calculateDateDiff($toDate.val(), $(this).val(), true));
  });
  
  $toDate.datepicker({
  
    beforeShowDay: $.datepicker.noWeekends
  }).on('change', function(){
    $fromDate.datepicker('option', 'maxDate', $(this).val());
    
    $numberDays.val(calculateDateDiff($(this).val(), $fromDate.val(), true));
  });;
  
  function calculateDateDiff(endDate, startDate, noWeekends) {
    if (endDate && startDate) {
      let e = moment(endDate),
        s = moment(startDate);
      
      if (!noWeekends) {
        return e.diff(s, "days");
      }
      
      let count = 0;
      for(let m = s; m.isBefore(e); m.add(1, 'days')) {
        if (m.isoWeekday() !== 6 && m.isoWeekday() !== 7) {
          count++;
        }
      }
      
      return count;
    }
    
    return null;
  }*/






/*function monthDiff(d1, d2) {
    var months;
    months = (d2.getFullYear() - d1.getFullYear()) * 12;
    months -= d1.getMonth();
    months += d2.getMonth();
    return months <= 0 ? 0 : months;
}



$(document).on('change', '.to_date', function(){

d1 = new Date($( "#from_date" ).val());
d2 = new Date($( "#to_date").val());
///alert("The difference between two dates is: " +monthDiff(d1, d2));
$('#no_of_days').val(monthDiff(d1, d2));
});

$(document).on('keyup', '.to_date', function(){
d1 = new Date($( "#from_date" ).val());
d2 = new Date($( "#to_date").val());
///alert("The difference between two dates is: " +monthDiff(d1, d2));
$('#no_of_days').val(monthDiff(d1, d2));
});*/

      

   $('#employee_detail_leaves_create_record').click(function(){
  	//alert('hi');
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
   		$('#employee_detail_leaves_form_result').html('');
   		$.ajax({
   			url:'/employee_detail_leaves_edit/'+id,
   			dataType:"json",
   			success:function(html){
   				$('#employee_name').val(html.data.employee_name);
   				$('#hidden_id').val(html.data.id);
   				$('.modal-title').text("EDIT THE RECORD");
			    $(".modal-body").removeClass('bg-primary').addClass('bg-success');
			    $(".modal-header").removeClass('bg-danger').addClass('bg-primary');
			    $(".modal-footer").removeClass('bg-danger').addClass('bg-primary');
			    $('#employee_detail_leaves_action_button').val("EDIT");
			    $('#employee_detail_leaves_action').val("EDIT");
			    $('#employee_detail_leaves_action_button').removeClass('btn btn-primary').addClass('btn btn-warning');
			    $('#cloes').removeClass('btn btn-secondary').addClass('btn btn-success');
			    $('#employee_detail_leaves_form_Modal').modal('show');
   			}
   		});
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
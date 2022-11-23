$(document).ready(function(){



  $( "#start_cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

  $( "#user_btn_refresh").click(function() { //it will use to clear the form data while clicking close button
   
    window.location = '/search_filter';
   });
  


  $('#user_search_submit').on('click',function(){

           var _token = $('#token').val();
            $value = $('#search').val();
            $search_dropdown = $('#search_dropdown option:selected').val();
            
            /*alert($search_dropdown);
            return;*/
            if($search_dropdown == "")
            {
            $('#search_dropdown').focus();
            alert("Please select");
            return false;
            }

            if(($search_dropdown!='') && ($value=='')){
              $('#search').focus();
              alert("Please enter to search");
              return false;
            }
            

      if( $search_dropdown =='email' && $value!=''){
            
         var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
         if (!testEmail.test($('#search').val())) {
             alert('enter valid email');
             $('#search').focus();
             return false;
         }
        }
           
            
            $.ajax({
               type:'GET',
               url:'/search_filter',
               data:{'search_dropdown':$search_dropdown,'search':$value,_token:_token},
               success: function(data){
                console.log(data);
               }
            });

            
   });


  $(document).on("change",'#search_dropdown',function(){
    var select_value = $('#search_dropdown option:selected').val();
      //alert(select_value);
      
      if(select_value=='name'){
        $('#search').attr('placeholder','Search By name');
      }
      else if(select_value=='email'){
        $('#search').attr('placeholder','Search By email');
      }
      else if(select_value=='skills'){
        $('#search').attr('placeholder','Search By Skills');
      }
      else if(select_value=='location'){
        $('#search').attr('placeholder','Search By location');
      }
      else{
        $('#search').attr('placeholder','');
      }
  });





   

    
});
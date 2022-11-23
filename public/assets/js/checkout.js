$(document).ready(function(){

	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
		}
	});

	
	
	$('.razorpay_pay_btn').click(function (e){
		e.preventDefault();

		var data = {
			'_token':$('input[name=_token]').val(),//this value automatically take from checkout form field {{ csrf_field() }}
			'first_name':$('input[name=first_name]').val(),
			'last_name':$('input[name=last_name]').val(),
			'phone_no':$('input[name=phone_no]').val(),
			'alternate_no':$('input[name=alternate_no]').val(),
			'address1':$('input[name=address1]').val(),
			'address2':$('input[name=address2]').val(),
			'city':$('input[name=city]').val(),
			'state':$('input[name=state]').val(),
			'pincode':$('input[name=pincode]').val(),
			'email':$('input[name=email]').val(),
			
		}
		$.ajax({
			type:"POST",
			url:'/confirm-razorpay-payment',
			data:data,
			success: function(response){
				if(response.status_code =="no data in cart"){
					window.location.href = "/cart";
				}
				else{
					/*console.log(response.total_price);
					return;*/
					 // "amount": (response.total_price * 100),

					var options = {
					    "key": "rzp_test_sXE9XOkXxUW12M", // Enter the Key ID generated from the Dashboard
					    "amount": (1 * 100), 
					    "name": "Scart",
					    "description": "Thank you for purchasing",
					    "image": "http://localhost:8000/images/logo.png",
					    "handler": function (razorpay_response){
					       $.ajax({
			        	type:"post",
			        	url:'/place-order',
			        	data:{

			        	'_token':$('input[name=_token]').val(),//this value automatically take from checkout form field {{ csrf_field() }}
						'razorpay_payment_id':razorpay_response.razorpay_payment_id,
						'first_name':$('input[name=first_name]').val(),
						'last_name':$('input[name=last_name]').val(),
						'phone_no':$('input[name=phone_no]').val(),
						'alternate_no':$('input[name=alternate_no]').val(),
						'address1':$('input[name=address1]').val(),
						'address2':$('input[name=address2]').val(),
						'city':$('input[name=city]').val(),
						'state':$('input[name=state]').val(),
						'pincode':$('input[name=pincode]').val(),
						'email':$('input[name=email]').val(),
						'place_order_razorpay':true,
			        	},
			        	success:function(messsuccess){
			        		window.location.href="/thank-you";
			        	}

        			});
					    },
					    "prefill": {
					        "name": response.first_name + response.last_name,
					        "email": response.email,
					        "contact": response.phone_no,
					    },
					   
					    "theme": {
					        "color": "#3399cc"
					    }
					};
					var rzp1 = new Razorpay(options);
					rzp1.open();
					e.preventDefault();
					
				}

			  }
			});

		});

});

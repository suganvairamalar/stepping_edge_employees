$(document).ready(function () {

    $('.add-to-wishlist-btn').click(function(e){

        e.preventDefault();
         $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

         var product_id = $(this).closest('.product_data').find('.product_id').val();
//alert(product_id);
         $.ajax({
            method:"post",
            url:"/add-to-wishist",
            data:{
                'product_id':product_id
            },
            success:function(response){
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
         })

    });

$('.wishlist-remove-btn').click(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var Clickedthis = $(this);
    var wishlist_id = $(Clickedthis).closest('.wishlist-content').find('.wishlist_id').val();
    //alert(wishlist_id);
    $.ajax({
        method: "POST",
        url:"/remove-from-wishist",
        data:{
            'wishlist_id': wishlist_id
        },
        success: function (response) {
            $(Clickedthis).closest('.wishlist-content').remove();
                alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
        }
    });



});

   cartload();
    
    function cartload() {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url:'/load-cart-data',
        method:"GET",
        success:function(response){
            $('.basket-item-cont').html('');
            var parsed = jQuery.parseJSON(response);
            var value = parsed;
            $('.basket-item-count').append($('<span class="badge badge-pill red">'+ value['totalcart']+'</span>'));
        }
    });
}

function cartload()
    {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: '/load-cart-data',
            method: "GET",
            success: function (response) {
                $('.basket-item-count').html('');
                var parsed = jQuery.parseJSON(response)
                var value = parsed; //Single Data Viewing
                $('.basket-item-count').append($('<span class="badge badge-pill red">'+ value['totalcart'] +'</span>'));
            }
        });
    }
     $('.increment-btn').click(function (e) {
            e.preventDefault();
            var incre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(incre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value<10){
                value++;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });

        $('.decrement-btn').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty-input').val();
            var value = parseInt(decre_value, 10);
            value = isNaN(value) ? 0 : value;
            if(value>1){
                value--;
                $(this).parents('.quantity').find('.qty-input').val(value);
            }
        });
       

        $('.add-to-cart-btn').click(function (e) {
            e.preventDefault();
           
                //alert("Hi");
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var product_id = $(this).closest('.product_data').find('.product_id').val();
            var quantity = $(this).closest('.product_data').find('.qty-input').val();
            //alert(product_id+" "+quantity);
            $.ajax({
                url: "/add-to-cart",
                method: "POST",
                data: {
                    'quantity': quantity,
                    'product_id': product_id,
                },
                success: function (response) {
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    cartload();
                },
            });
        });

        $('.changeQuantity').click(function(e){
            //alert("Hiii");
            e.preventDefault();
            var thisQuantityupdate = $(this);
            var quantity = $(this).closest(".cartpage").find('.qty-input').val();
            var product_id = $(this).closest(".cartpage").find('.product_id').val();

            var data = {
                '_token': $('input[name=_token]').val(),
                'quantity':quantity,
                'product_id':product_id,
            };
            $.ajax({
                url:'/update-to-cart',
                type:'POST',
                data:data,
                success:function(response) {
                   // window.location.reload();
                   //console.log(response.gt_price);
                   thisQuantityupdate.closest(".cartpage").find('.cart-grand-total-price').text(response.gt_price);
                   $('#totalajaxcall').load(location.href + ' .totalpricingload');
                   //oru space vittu thaan antha class ".totalpricingload" call pannanum..space illama kudutha work aagathu
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                }
            });
        });


    $('.delete_cart_data').click(function(e){
        e.preventDefault();
        var thisDeleterow = $(this);
        var product_id = $(this).closest(".cartpage").find('.product_id').val();
       // alert(product_id);
        var data = {
            '_token':$('input[name=_token]').val(),
            "product_id":product_id,
        };

        //$(this).closest('.cartpage').remove();//use to remove the closest row

        $.ajax({
            url: '/delete-from-cart',
            type:'DELETE',
            data:data,
            success:function(response){
                //window.location.reload();
                thisDeleterow.closest('.cartpage').remove();
                 $('#totalajaxcall').load(location.href + ' .totalpricingload');
                   //oru space vittu thaan antha class ".totalpricingload" call pannanum..space illama kudutha work aagathu
                   //also delete pannumpothu grandtoal decrease aaganum athukkuthaan itha inga call pandrom
                    alertify.set('notifier','position','top-right');
                    alertify.success(response.status);
                    cartload();
            }
        });
    });

    $('.clear_cart').click(function(e){
        e.preventDefault();
        $.ajax({
            url:'/clear-cart',
            type:'GET',
            success: function (response){
                window.location.reload();
                alertify.set('notifier','position','top-right');
                alertify.success(response.status);
            }
        });
    });




    });
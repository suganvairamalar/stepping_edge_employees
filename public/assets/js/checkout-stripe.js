$(document).ready(function(){


    $( "#cloes").click(function() { //it will use to clear the form data while clicking close button
    location.reload(true);
   });

    $('#StripeCardModal').click(function(){
    alert('hi');
    
    $('#stripe_form_Modal').modal('show');

  });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
        }
    });

    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
            inputSelector = ['input[type=email]',
                            'input[type=password]',
                            'input[type=text]',
                            'input[type=file]',
                            'textarea'].join(', '),
            $inputs       = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('.inp-error'),
            valid         = true;
            $errorMessage.addClass('d-none');
        $('.has-error').removeClass('has-error');

        $inputs.each(function(i, el) {
            var $input = $(el);
            if ($input.val() === '') {
                $input.parent().addClass('has-error');
                $errorMessage.removeClass('d-none');
                e.preventDefault();
            }
        });

        if (!$form.data('cc-on-file')) {
            var StripeKey = "pk_test_51IFMOTGQmLg4xVXba7BVbvNfgHsT7M6GqWWHCKr9oDXUWY1emtdCOWJ9aeYP0X4LIcNIL0Q6nfa9uw8UW33povml00oKzh0OF3";

            e.preventDefault();
            Stripe.setPublishableKey(StripeKey);
            Stripe.createToken({
               
                number: $('.card-number').val(),
                cvc: $('.card-cvc').val(),
                exp_month: $('.card-expiry-month').val(),
                exp_year: $('.card-expiry-year').val()
            }, stripeResponseHandler);
        }

    });

    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.stripe-error').text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
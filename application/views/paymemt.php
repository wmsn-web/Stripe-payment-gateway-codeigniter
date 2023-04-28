<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Stripe Payment</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.1/css/all.min.css" integrity="sha512-gMjQeDaELJ0ryCI+FtItusU9MkAifCZcGq789FrzkiM49D8lbDhoaUaIX4ASU187wofMNlgBJ4ckbrXM9sE6Pg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style type="text/css">
		.hide{
			display: none;
		}
		.form-group{
			margin-bottom: 15px;
		}
		.card-icon {
        font-size: 32px; /* adjust size as needed */
      }
      .input-group-text {
      	background-color: #fff;
      }
	</style>
</head>
<body>
	<div style="margin:0">
		<center>
			<div style="border:solid 1px #ccc; padding: 15px 30px;">
				<div class="row justify-content-center">
									<div class="col-md-8">
										<h1>Stripe Payment Gateway In Codeigniter</h1>
										<form role="form" action="<?php echo base_url('Payment/process_payment');?>" method="post"
							class="form-validation" data-cc-on-file="false"
							data-stripe-publishable-key="<?= $this->config->item('publish_key'); ?>"
							id="payment-form">
							<h4>Pay with Stripe</h4>

							<div class='form-row row mt-5'>
								<div class='col-md-12 form-group required'>
									<input class='form-control' name="name" size='4' type='text' required placeholder="Name On Card">
								</div>
							</div>
							<div class='form-row row'>
								<div class="col-md-6">
									<div class="input-group mb-3">
									    <div class="input-group-prepend">
									      <span class="input-group-text card-icon"><i class="fas fa-credit-card"></i></span>
									    </div>
									    <input autocomplete='off' id="cardNumber" class='form-control card-number' size='20' type='text' required placeholder="Card Number"  pattern="(\d{4}\s?){4}"  maxlength="19" style="font-size: 18px;">
									  </div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<input autocomplete='off' id="cvv" class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' required>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<input class='form-control card-expiry-month' id="month" placeholder='MM' size='2' type='text' required maxlength="2">
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<input class='form-control card-expiry-year' id="year" placeholder='YYYY' size='4' type='text' required maxlength="4">
									</div>
								</div>
								<div class="col-md-12">
									<img src="<?= base_url('assets/cards.png'); ?>" style="width: 150px;">
								</div>
								
							</div>
							
							<div class='form-row row'>
								<div class='col-md-12 error form-group hide'>
									<div class='alert-danger alert'>Error occured while making the payment.</div>
								</div>
							</div>
							<div class="row mt-4">
								<div class="col-md-12 text-center">
									<input type="hidden" name="amount" value="100">
									<button class="btn btn-primary btn-lg btn-block" type="submit">100 (€100)</button>
								</div>
							</div>
						</form>
									</div>
								</div>
			</div>
		</center>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">

	$(function () {
		var $stripeForm = $(".form-validation");
		$('form.form-validation').bind('submit', function (e) {
			var $stripeForm = $(".form-validation"),
				inputSelector = ['input[type=email]', 'input[type=password]',
					'input[type=text]', 'input[type=file]',
					'textarea'
				].join(', '),
				$inputs = $stripeForm.find('.required').find(inputSelector),
				$errorMessage = $stripeForm.find('div.error'),
				valid = true;
			$errorMessage.addClass('hide');
			$('.has-error').removeClass('has-error');
			$inputs.each(function (i, el) {
				var $input = $(el);
				if ($input.val() === '') {
					$input.parent().addClass('has-error');
					$errorMessage.removeClass('hide');
					e.preventDefault();
				}
			});
			if (!$stripeForm.data('cc-on-file')) {
				e.preventDefault();
				Stripe.setPublishableKey($stripeForm.data('stripe-publishable-key'));
				Stripe.createToken({
					number: $('.card-number').val(),
					cvc: $('.card-cvc').val(),
					exp_month: $('.card-expiry-month').val(),
					exp_year: $('.card-expiry-year').val()
				}, stripeResponseHandler);
			}
		});
		function stripeResponseHandler(status, res) {
			if (res.error) {
				$('.error')
					.removeClass('hide')
					.find('.alert')
					.text(res.error.message);
			} else {
				var token = res['id'];
				$stripeForm.find('input[type=text]').empty();
				$stripeForm.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
				$stripeForm.get(0).submit();
			}
		}
	});
</script>
<script>
      function getPaymentMethod(cardNumber) {
        // This is a simplified example that just checks the first digit
        var firstDigit = cardNumber.charAt(0);
        if (firstDigit === '4') {
          return 'fab fa-cc-visa text-primary';
        } else if (firstDigit === '5') {
          return 'fab fa-cc-mastercard text-danger';
        }else if(firstDigit === '3'){
        	return 'fab fa-cc-amex text-primary';
        }else if(firstDigit === '6'){
        	return 'fab fa-cc-discover text-primary';
        } else {
          return 'fas fa-credit-card text-info'; // fallback icon for unknown cards
        }
      }
      
      var cardNumberInput = document.getElementById('cardNumber');
      var cardIconSpan = document.querySelector('.card-icon');
      cardNumberInput.addEventListener('input', function(e) {
        var cardNumber = cardNumberInput.value;
        var iconClass = getPaymentMethod(cardNumber);
        $(".card-icon").html("");
        cardIconSpan.className = 'card-icon paymentfont ' + iconClass;

	        if (e.keyCode !== 8) {
					    if (this.value.length === 4 || this.value.length === 9 || this.value.length === 14) {
					      this.value = this.value += ' ';
					    }
			  }
      });
      
      $(document).ready(function(){
      	$('#cardNumber').on('keypress change', function () {
				  $(this).val(function (index, value) {
					  return value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
				  });
				});
				$("#cvv").on('keyup',function(){
					vals = $("#cvv").val();
					if(vals.length === 3)
					{
						$("#month").focus();
					}
				});
				$("#month").on('keyup',function(){
					vals = $("#month").val();
					if(vals > 12)
					{
						alert("Enter Valid Month");
					}
					else
					{
						if(vals.length === 2)
						{
							$("#year").focus();
						}
					}
						
				})
      });

    
    </script>
</body>
</html>
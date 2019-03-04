@extends('user.app')

@section('header_files')

	<style type="text/css">
		[type="radio"]+span:before, [type="radio"]+span:after{
	width: 7px;
	height: 7px;
	font-weight: bold;
	margin-top:8px;
}

.input-field>label{
	color: #A82751;
	font-weight: bold;
}



[type="radio"]:not(:checked)+span:before, [type="radio"]:not(:checked)+span:after{
	border:1px solid gray;
}

[type="radio"]:not(:checked)+span, [type="radio"]:checked+span{
	padding-left: 17px;
}

	</style>

@endsection

@section('main_content')
	
	<form action="{{ route('user.ticket.booking',Auth::user()->id) }}" method="post" id="payment-form">{{ csrf_field() }}
	<div class="container hide-on-med-and-up" id="ticket_opt">
		<h4>{{ $list->name }}</h4>
		<p>
			<label>
				<input type="radio" name="color" value="Black" id="color">
				<span>Event Access - Shopping and experimental activity</span>
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="color" value="red" id="color">
				<span>Ticket to a London Fashio Week: Insiders catwalk show</span>
			</label>
		</p>
		<p>
			<label>
				<input type="radio" name="color" id="color">
				<span>VIP access to the London Fashion Week</span>
			</label>
		</p>

		<table class="table">
			<tr>
				<td id="event_one">Event</td>
				<td colspan="2">
					<select id="select_par" style="display: block;height: 30px;">
						<option selected>Gena Drewes</option>
						<option selected>Feb Fest</option>
						<option selected>Youth Fest</option>
					</select>
				</td>
			</tr>
			<tr>
				<td id="event_one">Quantity</td>
				<td>
					<select id="quantity" style="display: block;width: 60px;height: 30px;">
						<option selected>1</option>
						<option>2</option>
						<option>3</option>
					</select>
				</td>
				<td>
					<div class="input-field">
						<label>Total</label>
						<input type="text" name="total" id="total" readonly value="$ {{ $list->price }}">
						<input type="hidden" value="$ {{ $list->price }}" id="total1">
					</div>
				</td>
			</tr>
			<tr>
				<td id="input" colspan="3">
					<label>Full Name</label>
					<input type="text" name="name" value="{{ ucfirst(Auth::user()->name) }}" style="border:1px solid gray; height: 20px;margin-top: 10px;">
				</td>
			</tr>
			<tr>
				<td id="input" colspan="3">
					<img src="{{ asset('user/img/img1.png')}}" id="img_pay">
				</td>
			</tr>
		</table>
		<table style="border:1px solid silver;width: 98%;margin-left: 1%">
			<tr>
				<td id="input" colspan="3" style="padding-left: 15px;padding-top: 4px;">
					<label>Card Number</label>
					<input type="text" name="card">
				</td>
			</tr>
			<tr>
				<td id="input" colspan="3" style="padding-left: 15px;padding-top: 4px;">
					<label>Expiry Date</label>
					<input type="text" name="card">
				</td>
			</tr>
			<tr>
				<td id="input" colspan="3" style="padding-left: 15px;padding-top: 4px;">
					<label>CSC</label>
					<input type="text" name="card">
				</td>
			</tr>
		</table>

		<!--stripe form start-->
		  <div class="form-row">
		    <label for="card-element">
		      Credit or debit card
		    </label>
		    <div id="card-element">
		      <!-- A Stripe Element will be inserted here. -->
		    </div>

		    <!-- Used to display Element errors. -->
		    <div id="card-errors" role="alert"></div>
		  </div>

		  <button type="submit" id="button" class="btn waves-light waves-effect">Pay</button>
		</form>

		<!--<form action="#" method="post">-->

		  <!-- Identify your business so that you can collect the payments. -->
		  <!--<input type="hidden" name="business" value="business@ampleson.com">-->

		  <!-- Specify a Buy Now button. -->
		  <!--<input type="hidden" name="cmd" value="_xclick">-->

		  <!-- Specify details about the item that buyers will purchase. -->
		  <!--<input type="hidden" name="item_name" value="Ticket AAA">
		  <input type="hidden" name="amount" value="40">
		  <input type="hidden" name="currency_code" value="USD">-->

		  <!--Return and Cancel_return URLs-->

		  <!--<input type="hidden" name="return" value="http://localhost/mobile_app/Home_controller/thankyou">
		  <input type="hidden" name="cancel_return" value="http://localhost/mobile_app">-->

		  <!-- Display the payment button. -->
		  
		  <!--<button type="submit" id="button" class="btn waves-light waves-effect">Pay</button>
		</form>-->

		
	</div>

@endsection

@section('footer_files')

	<script type="text/javascript">
		$(document).ready(function(){
			$('#quantity').change(function(){
				var quantity = $(this).val();
				var total = $('#total1').val();
				var sub = total.split(" ");
				//alert(sub[1]);

				var sub_total = quantity*sub[1];
				//console.log(sub_total);

				var value = "$ "+sub_total;

				$('#total').val(value);
			});
		});
	</script>

	<script type="text/javascript">
		
		var stripe = Stripe('pk_test_qOWfxyyeM92j3v76r3QBceWd');
		var elements = stripe.elements();

		// Custom styling can be passed to options when creating an Element.
		var style = {
		  base: {
		    // Add your base input styles here. For example:
		    fontSize: '16px',
		    color: "#32325d",
		  }
		};

		// Create an instance of the card Element.
		var card = elements.create('card', {style: style});

		// Add an instance of the card Element into the `card-element` <div>.
		card.mount('#card-element');

		//for generating any error
		card.addEventListener('change', function(event) {
		  var displayError = document.getElementById('card-errors');
		  if (event.error) {
		    displayError.textContent = event.error.message;
		  } else {
		    displayError.textContent = '';
		  }
		});

		//for generating token
		// Create a token or display an error when the form is submitted.
		var form = document.getElementById('payment-form');
		form.addEventListener('submit', function(event) {
		  event.preventDefault();

		  stripe.createToken(card).then(function(result) {
		    if (result.error) {
		      // Inform the customer that there was an error.
		      var errorElement = document.getElementById('card-errors');
		      errorElement.textContent = result.error.message;
		    } else {
		      // Send the token to your server.
		      stripeTokenHandler(result.token);
		    }
		  });
		});

		function stripeTokenHandler(token) {
			console.log(token);
		  // Insert the token ID into the form so it gets submitted to the server
		  var form = document.getElementById('payment-form');
		  var hiddenInput = document.createElement('input');
		  hiddenInput.setAttribute('type', 'hidden');
		  hiddenInput.setAttribute('name', 'stripeToken');
		  hiddenInput.setAttribute('value', token.id);
		  form.appendChild(hiddenInput);

		  // Submit the form
		  form.submit();
		}

	</script>

@endsection
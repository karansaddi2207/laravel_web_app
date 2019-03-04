<!--footer section start-->
	<footer class="page-footer hide-on-med-and-up">
		<div class="footer-copyright" style="background: #000">
			<div class="container center">
				<ul id="set_social_icon">
						<li><a href="#"><span class="fa fa-facebook"></span></a></li>
						
						<li><a href="#"><span class="fa fa-twitter"></span></a></li>
						
						<li><a href="#"><span class="fa fa-google"></span></a></li>
					</ul>
				&copy; 2018 to <?= date('Y'); ?> Copyright All Reserved
				<a href="#!" class="grey-text text-lighten-4 right">Design By Karan Saddi</a>
			</div>
	</footer>

	<!--jquery js-->
	
	<script type="text/javascript" src="{{ asset('user/materialize/js/jquery-3.2.1.min.js') }}"></script>

	<!--materialize js-->

	<script type="text/javascript" src="{{ asset('user/materialize/js/materialize.min.js') }}"></script>

	<!--stripe pament elements.js-->
	<script src="https://js.stripe.com/v3/"></script>

	@section('footer_files')

	@show

	<!--footer section end-->


	<script type="text/javascript">

		$(document).ready(function(){

			$('.carousel').carousel();
			$('.tap-target').tapTarget();

			//sidenav start
			$('.sidenav').sidenav();
			//sidenav end

			$('.tap-target').tapTarget('open');

			//calling modal
			$('.modal').modal({
				dismissible : true
			});


			$('#get_started').click(function(){
				$('body,html').animate({scrollTop:$('#email').height()},250);
				M.toast({html : 'Please Sign Up'});
				$('#first_name').focus();
			});

			$('#sign_up').click(function(){
				M.toast({html : 'Please sign up below'});
				$('#first_name').focus();
			});

		});

	</script>
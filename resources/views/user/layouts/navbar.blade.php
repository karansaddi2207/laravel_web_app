<!--topbar seciton end-->
	<nav class="hide-on-med-and-up">
		<div class="nav-wrapper" style="background: #A82751">
			<a href="#" class="sidenav-trigger left" data-target="mobile_menu">
				 <i class="material-icons">menu</i>
			</a>
			<!--menu button section start-->
			<a href="#" class="brand-logo left" style="padding-left: 30px;" id="brand_logo">&nbsp;&nbsp;&nbsp;
				<?php

					$url = Request::url();
					
					$value = explode('/',$url);
					//echo "<pre>";print_r($value);
					//echo count($value);
					if(count($value)==5)
					{
						if($value['4']=='login')
						{
							echo "LogIn";
						}
						elseif($value['4']=='signup')
						{
							echo "SignUp";
						}
						elseif($value['4']=='favourites')
						{
							echo "Favourites";
						}
						elseif($value['4']=='location')
						{
							echo "Location";
						}
						elseif($value['4']=='ticket_options')
						{
							echo "Ticket Options";
						}
						elseif($value['4']=='booking')
						{
							echo "Booking";
						}
						elseif($value['4']=='point_of_interest')
						{
							echo "Ponits Of Interest";
						}
						else
						{
							echo "Home";
						}

					}
					elseif(count($value)==7)
					{
						echo "Point Of Interest Detail";
					}
					else
					{
						echo "Home";
					}

				?>
			</a>
			
			<!--menu button section end-->
			<!--mobile menu section start-->
			<ul class="sidenav" id="mobile_menu">
				<li>
					<a href="#" class="black white-text">
						<span class="fa fa-user"></span>&nbsp;&nbsp;
						{{ Auth::check() ? ucfirst(Auth::user()->name) : 'Hi, Guest' }}
					</a>

				</li>
				<li><a href="{{ url('/') }}" class="
					<?php 
						/*$current = current_url();
						$url = explode('/',$current);
						if(count($url)==5)
						{//echo count($url);
							echo 'orange white-text';
						}
						else
						{
							if($url[5]=='index')
							{
								echo 'orange white-text';
							}
						}	*/
					?>
					">Home</a></li>

				<li><a href="{{ route('user.favourites') }}" class="
					<?php 
						/*$current = current_url();
						$url = explode('/',$current);
						if(count($url)==6)
						{
							if($url[5]=='favourites')
							{
								echo 'orange white-text';
							}
						}*/
					?>
					">Favourites</a></li>
				<li><a href="{{ route('user.location') }}" class="
					<?php 
						/*$current = current_url();
						$url = explode('/',$current);
						if(count($url)==6)
						{
							if($url[5]=='location')
							{
								echo 'orange white-text';
							}
						}*/
					?>
					">Location</a></li>
				<?php

					//if($this->session->userdata('id'))
					//{
					
				?>

				<li><a href="{{ route('user.ticket_options') }}" class="
					<?php 
						//$current = current_url();
						////$url = explode('/',$current);
						//if(count($url)==6)
						//{
						//	if($url[5]=='ticket_options')
						//	{
						//		echo 'orange white-text';
						//	}
						//}
					?>
					">Ticket Options</a></li>

				<li><a href="{{ route('user.point_of_interest') }}" class="
					<?php 
						/*$current = current_url();
						$url = explode('/',$current);
						if(count($url)==6)
						{
							if($url[5]=='point_of_interest')
							{
								echo 'orange white-text';
							}
						}*/
					?>
					">Ponits Of Interest</a></li>

				@auth

				<li><a href="{{ route('logout') }}">Logout</a></li>
				@else
				<li><a href="{{ route('register') }}" class="
					<?php /*
						$current = current_url();
						$url = explode('/',$current);
						//echo $url[5];
						//print_r($url);
						if(count($url)==6)
						{
							if($url[5]=='signup')
							{
								echo 'orange white-text';
							}
						}*/
						
					?>
					">SignUp</a></li>
				<li>
					<a href="{{ route('login') }}" class="
					<?php 
						/*$current = current_url();
						$url = explode('/',$current);
						if(count($url)==6)
						{
							if($url[5]=='login')
							{
								echo 'orange white-text';
							}
						} */
 					?>
					">LogIn</a>
				</li>
				@endauth
			</ul>
			</div>
		</div>
	</nav>
			<!--mobile menu section end-->
			
	@section('header_img')

		@show			
				
					    
					 
  				
			
@extends('layouts.master')

@section('title', awt('Contacter Us'))

@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/contact_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/contact_responsive.css') }}">
@endsection

@section('content')
<div class="container contact_container">
	<div class="row">
		<div class="col">

			<!-- Breadcrumbs -->

			<div class="breadcrumbs d-flex flex-row align-items-center">
				<ul>
					<li>
						<a href="{{ route('index') }}">
							@awt('Home')
						</a>
					</li>
					<li class="active">
						<a href="#">
							<i class="fa fa-angle-right" aria-hidden="true"></i>
							@awt('Contact')
						</a>
					</li>
				</ul>
			</div>

		</div>
	</div>

	<!-- Map Container -->

	<div class="row">
		<div class="col">
			<div id="google_map">
				<div class="map_container">
					<div id="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7959.6847652993865!2d9.760306024150212!3d4.052550788212226!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x10610daa5c37ea13%3A0x4f65674762a98afb!2sCite%20des%20Palmiers%2C%20Douala!5e0!3m2!1sfr!2scm!4v1611596638640!5m2!1sfr!2scm" width="1200" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Us -->

	<div class="row">

		<div class="col-lg-6 contact_col">
			<div class="contact_contents">
				<h1>@awt('Contact Us')</h1>
				<p>@awt('There are many ways to contact us. You may drop us a line, give us a call or send an email, choose what suits you the most.')</p>
				<div>
					<p>(+237) 671 50 40 37</p>
					<p>wallylegenie@gmail.com</p>
				</div>
				
				<div>
					<p>@awt('Open hours: 8.00 AM - 18.00 PM Mon-Sat')</p>
					<p>@awt('Sunday: Closed')</p>
				</div>
			</div>

			<!-- Follow Us -->

			<div class="follow_us_contents">
				<h1>@awt('Follow Us')</h1>
				<ul class="social d-flex flex-row">
					<li><a href="https://www.facebook.com/allyourneeds237" style="background-color: #3a61c9"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" style="background-color: #41a1f6"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" style="background-color: #fb4343"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li><a href="#" style="background-color: #8f6247"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				</ul>
			</div>

		</div>

		<div class="col-lg-6 get_in_touch_col">
			<div class="get_in_touch_contents">
				<h1>@awt('Get In Touch With Us!')</h1>
				<p>
					@awt('Fill out the form below to recieve a free and confidential.')
				</p>
				<form action="post">
					<div>
						<input id="input_name" class="form_input input_name input_ph" type="text" name="name" placeholder="@awt('Name')" required="required" data-error="@awt('Name is required.')">
						<input id="input_email" class="form_input input_email input_ph" type="email" name="email" placeholder="@awt('Email')" required="required" data-error="@awt('Valid email is required.')">
						<textarea id="input_message" class="input_ph input_message" name="message"  placeholder="@awt('Message')" rows="3" required data-error="@awt('Please, write us a message.')"></textarea>
					</div>
					<div>
						<button id="review_submit" type="submit" class="red_button message_submit_btn trans_300" value="Submit">
							@awt('send message')
						</button>
					</div>
				</form>
			</div>
		</div>

	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('assets/js/contact_custom.js') }}"></script>
@endsection
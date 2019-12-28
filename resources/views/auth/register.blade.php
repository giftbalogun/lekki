@extends('layouts.master')
@section('title', 'Lesson Plans')

@section('content')
<header id="fh5co-header" class="fh5co-cover fh5co-cover-xs" role="banner" style="background-image:url({{ asset('master/images/stock/teacher-group.jpeg') }});background-size:contain;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
							<div class="display-t">
									<div class="display-tc animate-box" data-animate-effect="fadeIn">
										<h1>Enter your details</h1>
									</div>
							</div>
					</div>
			</div>
	</div>
</header>

<div id="fh5co-contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6 animate-box">
				<h3>Register</h3>
				<form action="{{ route('register') }}" method="post">
				@include('includes.alert')
					@csrf
					<div class="row form-group">
						<div class="col-md-6">
							<!-- <label for="fname">First Name</label> -->
							<input type="text" id="fname" class="form-control" placeholder="Full Name" name="name">
						</div>
						<div class="col-md-6">
							<!-- <label for="lname">Last Name</label> -->
							<input type="text" id="email" class="form-control" placeholder="Email" name="email">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-6">
							<!-- <label for="subject">Subject</label> -->
							<input type="text" id="phone" class="form-control" placeholder="Phone Number" name="phone">
						</div>

						<div class="col-md-6">
							<!-- <label for="subject">Subject</label> -->
							<input type="text" id="address" class="form-control" placeholder="Address" name="address">
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-6">
							<!-- <label for="subject">Subject</label> -->
							<input type="password" class="form-control" placeholder="Password" name="password">
						</div>

						<div class="col-md-6">
							<!-- <label for="subject">Subject</label> -->
							<input type="password"  class="form-control" placeholder="Confirm Password" name="password_confirmation">
						</div>
					</div>

					<div class="form-group">
						<input type="submit" value="Register" class="btn btn-primary">
					</div>

				</form>		
			</div>
		</div>
		
	</div>
</div>
@endsection
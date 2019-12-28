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
										<h1>Become a Tutor</h1>
									</div>
							</div>
					</div>
			</div>
	</div>
</header>

<div id="fh5co-contact">
    <div class="container">
        <div class="row">
					<div class="col-md-3 animate-box center-block">
					</div>
            <div class="col-md-6 animate-box center-block">
                <h3>Apply To Be A Tutor</h3>
                <form  method="post" action="{{ route('become-tutor.post') }}" enctype="multipart/form-data">
								@include('includes.alert')
								@csrf
                    <div class="row form-group">
                        <div class="col-md-6">
                            <!-- <label for="fname">First Name</label> -->
                            <input type="text" id="fname" name="fullname" value="{{ old('fullname') }}" class="form-control" placeholder="Fullname">
                        </div>
                        <div class="col-md-6">
                            <!-- <label for="lname">Last Name</label> -->
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="Phone: +234xxx">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <!-- <label for="email">Email</label> -->
                            <input type="text" id="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                        </div>
                    </div>

										<div class="row form-group">
                        <div class="col-md-12">
                           <label for="cv">CV / Resume (PDF)</label>
                            <input type="file" id="cv" name="cv" class="form-control" placeholder="CV">
                        </div>
                    </div>

                    <!--div class="row form-group">
                        <div class="col-md-12">-->
                            <!-- <label for="message">Message</label> >
                            <textarea name="message" name="about" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about yourself"></textarea>
                        </div>
                    </div-->



                    <div class="form-group">
                        <input type="submit" value="Apply" class="btn btn-primary">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection

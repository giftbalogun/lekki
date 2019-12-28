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
										<h1>Select Lesson Plan</h1>
									</div>
							</div>
					</div>
			</div>
	</div>
</header>

<div id="fh5co-pricing">
		<div class="container">
			@foreach($packages as $group => $groupPackages)
			<div class="row">
				<div class="col-lg-12">
					<div class="row">
						<div class="col-md-8 col-md-offset-2 text-center">
								<div class="display-t">
										<div class="display-tc animate-box" data-animate-effect="fadeIn">
											<h3>{{ title_case($group) }}</h3>
										</div>
								</div>
						</div>
					</div>
					<div class="row">
						<div class="pricing">
							@foreach($groupPackages as $package)
							<div class="col-md-3 animate-box">
								<div class="price-box">
									<h2 class="pricing-plan">{{ title_case($package->name) }}</h2>
									<!--div class="price"><sup class="currency">&#8358;</sup></small></div-->
									<ul class="classes">
										<li>Home tutoring available Now</li>
										<!--li class="color">Online tutoring available</li-->
									</ul>
									<a href="{{ route('client-details.show', ['package' => $package->id]) }}" class="btn btn-select-plan btn-sm">Select Package</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
</div>
@endsection

@extends('layouts.master')
@section('title', 'Checkout')

@section('content')
<header id="fh5co-header" class="fh5co-cover fh5co-cover-xs" role="banner" style="background-image:url({{ asset('master/images/stock/teacher-group.jpeg') }});background-size:contain;" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
			<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
							<div class="display-t">
									<div class="display-tc animate-box" data-animate-effect="fadeIn">
										<h1>Checkout</h1>
									</div>
							</div>
					</div>
			</div>
	</div>
</header>

<div id="fh5co-contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6 animate-box" id="checkout-form">
				<h3>Checkout Details</h3>
				<form action="{{ route('register') }}" v-on:submit.prevent method="post" >
				@include('includes.alert')
					@csrf
					<div class="row form-group">
						<div class="col-md-6">

							<label for="fname">State</label>
							<select v-model="currentState" class="form-control">
								<option value=""></option>
								<option v-for="state in states" :value="state.id">${ state.name }</option>
							</select>
						</div>

						<div class="col-md-6">
							<label for="lname">LGA</label>
							<select v-model="currentLga" class="form-control">
								<option value=""></option>
								<option v-for="lga in lgas" :value="lga.id">${ lga.name }</option>
							</select>
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-6">
						<h5>Rates</h5>
							Monthly: &#8358;${ priceDetails.month }, Hourly: &#8358;${ priceDetails.hour }
						</div>
					</div>

					<div class="row form-group">
						<div class="col-md-6">
							<label for="lname">Duration Type</label>
							<select v-model="durationType" class="form-control">
								<option value="month">Month</option>
								<option value="hour">Hour</option>
							</select>
						</div>

						<div class="col-md-6">
							<label for="subject">Duration Unit</label>
							<input type="number"  class="form-control" v-model="durationUnit">
						</div>

						<div class="col-md-6">
						<label for="subject">Start Date</label>
							<input type="date"  class="form-control" v-model="startDate">
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<h2>Total: &#8358;${ totalPrice }</h2>
						</div>
					</div>
				</form>		

				<form action="{{ route('package.payment') }}" method="post">
				@csrf
					<input type="hidden" name="email" value="{{ Auth::user()->email }}">
					<!-- multiplication by 100 is done because paystack accepts cash in kobo-->
					<input type="hidden" name="amount" :value="totalPrice * 100">
					<input type="hidden" name="tutor" value="{{ $tutor }}">
					<input type="hidden" name="package" value="{{ $package }}">
					<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
					<input type="hidden" name="key" value="{{ config('paystack.secretKey') }}">
					<input type="hidden" name="state" :value="currentState">
					<input type="hidden" name="lga" :value="currentLga">
					<input type="hidden" name="durationKind" :value="durationType">
					<input type="hidden" name="durationValue" :value="durationUnit">
					<input type="hidden" name="start_date" :value="startDate">
					<div class="form-group">
						<input type="submit" value="Checkout" class="btn btn-primary">
					</div>
				</form>

			</div>
		</div>
		
	</div>
</div>
@endsection

@push('page-scripts')
<script type="text/javascript">
/*	Notice! Use multiline comments because of minification */
var vm = new Vue({
    delimiters: ['${', '}'],
    el: "#checkout-form",
    data: {
        error: null,
				states: JSON.parse('{!! addslashes($states) !!}'),
				currentState: null,
				lgas: [],
				currentLga: null,
				priceDetails: {"month": 0, "hour": 0},
				package: {{ $package }},
				tutor: {{ $tutor }},
				durationType: "month",
				durationUnit: 1,
				totalPrice: 0,
				startDate: ""
    },
		updated: function () {
			this.$nextTick(function () {
				// Code that will run only after the
				// entire view has been re-rendered
				this.calculateTotalPrice();
			})
		},
		watch: {
			currentState: function () {
				this.getLgas();
				this.getPackagePrice();	
			},
			currentLga: function () {
				this.getPackagePrice();
			}
		},
    methods: {
        getLgas: function () {
					var cvm = this;
					axios.post("{{ route('state.lgas') }}",{
							state: cvm.currentState
					}).then(function(response){
							cvm.lgas = response.data
					}).catch(function(error){
							console.log(error);
					});
        },
				getPackagePrice: function () {
					var cvm = this;
					axios.post("{{ route('package.price') }}",{
							package: cvm.package, lga: cvm.currentLga, state: cvm.currentState
					}).then(function(response){
						cvm.priceDetails = response.data;
					}).catch(function(error){
							console.log(error);
					});
				},
				calculateTotalPrice: function () {
					/*compare values and change*/
					this.totalPrice =	this.priceDetails[this.durationType] * this.durationUnit;
				}
    }
});
</script>
@endpush
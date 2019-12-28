@extends('layouts.admin')
@section('title', 'Dashboard')
@section('active-tutor','active')
@section('content')
<section class="content-header">
  <h1>
    Tutors
    <small>LVA</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">Tutors</li>
  </ol>
</section>
<!-- Main content -->
<section class="content" id="mainTutorsContent">
@include('includes.alert-frontend')
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Tutor Applications</h3>
				</div>

				<div class="box-body table-responsive no-padding">
					<table class="table table-hover">
						<tr>
							<th>S/N</th>
							<th>Fullname</th>
							<th>Email</th>
							<th>Phone</th>
                            <th>CV</th>
                            <th>Status</th>
							<th>Action</th>
						</tr>

						<tr v-cloak v-for="(tutor, index) in tutorApplications">
							<td>${ (index + 1) }</td>
							<td>${ tutor.fullname }</td>
							<td>${ tutor.email }</td>
							<td>${ tutor.phone }</td>
                            <td><a :href="'{{asset('/')}}' + tutor.cv">CV</a></td>
                            <td>${ tutor.status }</td>
                            <td><button class="btn btn-primary bg-blue" v-on:click="updateTutorRequest($event, tutor, index)">Accept</button></td>

                        </tr>

					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@push('custom-page-scripts')
<script type="text/javascript">
var vm = new Vue({
		delimiters: ['${', '}'],
		el: "#mainTutorsContent",
		data: {
			erorr: null,
			tutorSearch: null,
			currentTutor: null,
			tutorApplications: JSON.parse('{!! addslashes(json_encode(\App\TutorApplication::all())) !!}'),
			currentIndex: null,
			alert: { success: null, error: null, info: null, warning: null }
		},
		watch: {
			tutorSearch: function() {

			}
		},
		methods: {
			closeModal: function() {
				this.groupGuns[this.currentIndex] = this.currentGunRevert;
				this.showModal = false;
			},
			editGun: function (e, gun, index) {
				e.preventDefault();
				this.showModal = true;
				this.currentGun = gun;
				this.currentIndex = index;
				this.currentGunRevert = Object.assign({},gun);
			},

			updateTutorRequest: function (e, tutor) {
				e.preventDefault();
				axios.post("{{ route('admin.tutors.accept') }}", {
					//gun_details: this.currentGun
                    tutor:  tutor
				})
					.then(response => {
                        console.log(response.data);
						//receive response and create alert
						switch (response.data.type) {
							case 'error':
								this.alert.error = response.data.message
								break;
							case 'success':
								this.alert.success = response.data.message
								//clear fields

								break;
						}
					})
					.catch(function (error) {
						console.log(error);
					});
			},
			clearAlert: function (name) {
				this.alert[name] = null;
			}
		}
	});
</script>
@endpush

@extends('layouts.admin')
@section('title', 'Dashboard')
@section('active-users','active')
@section('content')
<section class="content-header">
  <h1>
    Users
    <small>LVA</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{ route('admin.dashboard') }}"><i class="fa fa-dashboard"></i> Admin</a></li>
    <li class="active">Registered Clients and Tutors</li>
  </ol>
</section>
<!-- Main content -->
<section class="content" id="mainUsersContent">
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
							<th>Name</th>
							<th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
						</tr>

						<tr v-cloak v-for="(user, index) in users">
							<td>${ (index + 1) }</td>
							<td>${ user.name }</td>
							<td>${ user.email }</td>
                            <td>${ user.phone }</td>
                            <td>${ user.address }</td>
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
		el: "#mainUsersContent",
		data: {
			users: JSON.parse('{!! addslashes(json_encode(\App\User::all())) !!}'),
			alert: { success: null, error: null, info: null, warning: null }
		},

	});
</script>
@endpush

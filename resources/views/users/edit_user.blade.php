@extends('layouts.app')

@section('content')

<style type="text/css">
	h1 {
		padding: 0;
		margin: 0 8px;
		font-size: 24px;
		color: #2679b5;
	}
</style>

<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

<?php // print_r($user->id); ?>
<div class="row">
	<div class="col-md-12">
		<div class="card" style="padding: 12px;">
			<div class="row">
				<div class="col-md-12">
					<h1>User<small> <i class="icon-arrow-right5"></i>Edit User</small></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<hr align="left">
				</div>
			</div>

			<form method="POST" action="{{ url('/user/edit/'.$user->id) }}" id="adit_user_form">
				{{ csrf_field() }}

				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Activation</p>
						</span>
					</div>
					<div class="col-md-3">
						<div class="form-check form-check-switch form-check-switch-left">
							<label class="form-check-label d-flex align-items-center">
								<input type="checkbox" data-on-text="On" data-off-text="Off" class="form-check-input-switch" data-size="small" checked>
							</label>
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>User Roles</p>
						</span>
					</div>
					<div class="col-md-3">
						<select class="custom-select1" name="user_role">
							@if(count($user_roles) > 0)
							@foreach($user_roles as $role)
							<option value="{{ $role->id }}" <?php if ($role->id == $user->user_role){
									echo 'selected="selected"';
								} ?>><span>{{ $role->description }}</span></option>
							@endforeach
							@endif
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>First Name</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Last Name</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Email</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="email" value="{{ $user->email }}" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="col-md-2 offset-md-3">
						<span class="input-group-text">
							<p>Password</p>
						</span>
					</div>
					<div class="col-md-3">
						<input type="password" name="password" value="{{ $user->password }}" class="form-control">
					</div>
				</div>
				<div class="row" style="text-align: center;margin:30px 0;">
					<div class="col-md-9 offset-md-1">
						<button type="submit" style="background-color: #4f99c6!important;margin-right: 12px;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Update</button>
						<button type="button" style="background-color: #8b9aa3!important;margin-left: 12px;" class="btn btn-primary legitRipple" onclick="resetForm();"><i class="icon-reset mr-2"></i>Reset</button>
					</div>
				</div>
			</form>
		</div>

	</div>
</div>


<script type="text/javascript">
	$('.form-check-input-switch').bootstrapSwitch();
	$('.custom-select').select2({
		minimumResultsForSearch: Infinity
	});
	$('.custom-select1').select2({
		minimumResultsForSearch: Infinity
	});

	function resetForm() {
		//alert();
		document.getElementById("adit_user_form").reset();
	}
</script>

@endsection
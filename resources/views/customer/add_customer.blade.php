@extends('layouts.app')

@section('content')

<script src="{{asset('js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{ asset('js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{asset('js/plugins/forms/selects/select2.min.js')}}"></script>



<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="row">
					<div class="col-md-3 offset-md-3" style=" margin-top: 30px;">
						<div class="form-check form-check-switchery">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input-switchery" checked data-fouc>
							</label>
						</div>
					</div>
				</div>
				<div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;"></span>
					</div>
					<div class="col-md-2">
						<span class="switchery switchery-default" style="background-color: rgb(100, 189, 99); border-color: rgb(100, 189, 99); box-shadow: rgb(100, 189, 99) 0px 0px 0px 10px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 18px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Account Type</span>
					</div>
					<div class="col-md-2">
						<select class="custom-select" name="position_at_company">
			                <option value="Manager"><span>Manager</span></option>
			                <option value="Worker">Worker</option>
			                <option value="Salesman">Salesman</option>
			            </select>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Package</span>
					</div>
					<div class="col-md-2">
						<select class="custom-select" name="position_at_company">
			                <option value=""><span>Basic Package | 1</span></option>
			                <option value="">Medium Package | 2</option>
			            </select>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Company Name</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="lbs_weight" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Address</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="lbs_weight" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Address 2</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="lbs_weight" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">City</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">State</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Zip</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Phone</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Face</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Email</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-4">
						<span class="input-group-text" style="font-size: 20px;">Notes</span>
					</div>
					<div class="col-md-2">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <!-- <div class="row"">
			    	<div class="col-md-2 offset-md-5">
			    		<div class="input-group">
			    			<span class="input-group-append" style="margin-left: 0px;">
								<span class="input-group-text" style="">Company Name</span>	
							</span>
							<input type="text" name="lbs_weight" id="" class="form-control">
						</div>
			    	</div>
			    </div>
				<div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">Company Name</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">Address</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div>
			   <div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">Address 2</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">City</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div>
			    <<div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">State</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">Zip</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">Phone</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">Fax</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">Email</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-3 offset-md-5">
			    		<div class="input-group">
							<span class="input-group-text" style="font-size: 20px;">Notes</span>
							<input type="text" name="lbs_weight" id="" style="margin-left: 10px;" class="form-control">
						</div>
			    	</div>
			    </div> -->
			    <div class="row" style="text-align: center;margin:30px 0;">
			    	<div class="col-md-6 offset-md-1" style="text-align: right;">
			    		<button type="button" style="background-color: #9c9cf1;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Submit</button>
			    	</div>
			    	<div class="col-md-5" style="text-align: left;">
			    		<button type="button" style="background-color: #be9aef;" class="btn btn-primary legitRipple"><i class="icon-reset mr-2"></i>Reset</button>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.form-check-input-switch').bootstrapSwitch();
	$('.custom-select').select2();

</script>

@endsection
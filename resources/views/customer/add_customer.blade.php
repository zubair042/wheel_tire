@extends('layouts.app')

@section('content')

<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>



<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card" style="padding: 12px;">
				<div class="row">
					<div class="col-md-3 offset-md-3" style=" margin-top: 30px;">
						<div class="form-check form-check-switchery">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input-switchery" checked data-fouc>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Account Type</span>
					</div>
					<div class="col-md-3">
						<select class="custom-select" name="position_at_company">
			                <option value="Manager"><span>Manager</span></option>
			                <option value="Worker">Worker</option>
			                <option value="Salesman">Salesman</option>
			            </select>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Package</span>
					</div>
					<div class="col-md-3">
						<select class="custom-select" name="position_at_company">
			                <option value=""><span>Basic Package | 1</span></option>
			                <option value="">Medium Package | 2</option>
			            </select>
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Company Name</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="lbs_weight" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Address</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="lbs_weight" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Address 2</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="lbs_weight" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">City</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">State</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Zip</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Phone</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Face</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Email</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row"">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Notes</span>
					</div>
					<div class="col-md-3">
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
			    </div> -->
			    <div class="row" style="text-align: center;margin:30px 0;">
			    	<div class="col-md-6 offset-md-1" style="text-align: right;">
			    		<button type="button" style="background-color: #6262e1;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Submit</button>
			    	</div>
			    	<div class="col-md-5" style="text-align: left;">
			    		<button type="button" style="background-color: #ccc7d2;" class="btn btn-primary legitRipple"><i class="icon-reset mr-2"></i>Reset</button>
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
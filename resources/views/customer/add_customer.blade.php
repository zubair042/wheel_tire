@extends('layouts.app')

@section('content')

<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

<div class="row">
	<div class="col-md-12">
		<div class="card" style="padding: 12px;">
			<div class="row">
				<div class="col-md-12">
					<h1 style="padding: 0;margin: 0 8px;font-size: 24px;color: #2679b5;">Customer<small> <i class="icon-arrow-right5"></i>Add New</small></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<hr align="left" >
				</div>
			</div>
			<div class="row">
				<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Activation</span>
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
					<span class="input-group-text" style="font-size: 18px;">Account Type</span>
				</div>
				<div class="col-md-3">
					<select class="select_select2" name="position_at_company">
		                <option value="Manager"><span>Manager</span></option>
		                <option value="Worker">Worker</option>
		                <option value="Salesman">Salesman</option>
		            </select>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Package</span>
				</div>
				<div class="col-md-3">
					<select class="select_select2" name="position_at_company">
		                <option value=""><span>Basic Package | 1</span></option>
		                <option value="">Medium Package | 2</option>
		            </select>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Company Name</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="lbs_weight" id="" class="form-control">
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Address</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="lbs_weight" id="" class="form-control">
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Address 2</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="lbs_weight" id="" class="form-control">
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">City</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="" id="" class="form-control">
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">State</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="" id="" class="form-control">
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Zip</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="" id="" class="form-control">
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Phone</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="" id="" class="form-control">
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Face</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="" id="" class="form-control">
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Email</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="" id="" class="form-control">
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-2 offset-md-3">
					<span class="input-group-text" style="font-size: 18px;">Notes</span>
				</div>
				<div class="col-md-3">
					<input type="text" name="" id="" class="form-control">
		    	</div>
		    </div>
		    <!-- <div class="row">
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
		    	<div class="col-md-9 offset-md-1">
		    		<button type="button" style="background-color: #4f99c6!important;margin-right: 12px;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Submit</button>
		    		<button type="button" style="background-color: #8b9aa3!important;margin-left: 12px;" class="btn btn-primary legitRipple"><i class="icon-reset mr-2"></i>Reset</button>
		    	</div>
		    </div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$('.form-check-input-switch').bootstrapSwitch();
	$('.select_select2').select2({
	    minimumResultsForSearch: Infinity
	});

</script>

@endsection
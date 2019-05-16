@extends('layouts.app')

@section('content')
<?php //echo "<pre>";print_r($location);exit; ?>
<script src="{{asset('global_assets/js/plugins/forms/styling/switch.min.js')}}"></script>
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>

<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card" style="padding: 12px;">
				<div class="row">
				<div class="col-md-12">
					<h1 style="padding: 0;margin: 0 8px;font-size: 24px;color: #2679b5;">Location<small> <i class="icon-arrow-right5"></i>Edit Location</small></h1>
				</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<hr align="left" >
					</div>
				</div>
				<form method="POST" action="{{ url('/location/edit/'.$location->id) }}" id="edit_location_form" >
					{{csrf_field()}}
					<div class="row">
						<div class="col-md-2 offset-md-3">
							<span class="input-group-text" style="font-size: 18px;">Activation</span>
						</div>
						<div class="col-md-3">
							<div class="form-check form-check-switch form-check-switch-left">
								<label class="form-check-label d-flex align-items-center">
									<input type="checkbox" data-on-text="On" data-off-text="Off" class="form-check-input-switch" data-size="small" name="" checked>
								</label>
							</div>
						</div>
					</div>
					<div class="row">
				    	<div class="col-md-2 offset-md-3">
							<span class="input-group-text" style="font-size: 18px;">Customer</span>
						</div>
						<div class="col-md-3">
							<select class="select_select2_select2" name="customer_type" value="choose.." >
				                <option value="Customer 1"><span>Customer 1</span></option>
				                <option value="Customer 2">Customer 2</option>
				                <option value="Customer 3">Customer 3</option>
				            </select>
				    	</div>
				    </div>
				    <div class="row">
				    	<div class="col-md-2 offset-md-3">
							<span class="input-group-text" style="font-size: 18px;">Location Name</span>
						</div>
						<div class="col-md-3">
							<input type="text" name="location_name" id="" value="{{ $location->location_name }}" class="form-control">
				    	</div>
				    </div>
					<div class="row" style="text-align: center;margin:30px 0;">
				    	<div class="col-md-9 offset-md-1">
				    		<button type="submit" style="background-color: #4f99c6!important;margin-right: 12px;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Submit</button>
				    		<button type="button" style="background-color: #8b9aa3!important;margin-left: 12px;" class="btn btn-primary legitRipple" onclick="resetForm();"><i class="icon-reset mr-2"></i>Reset</button>
				    	</div>
				    </div>
			    </form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$('.form-check-input-switch').bootstrapSwitch();
	$('.select_select2_select2').select2({
	    minimumResultsForSearch: Infinity
	});

	function resetForm() {
		//alert();
    	document.getElementById("edit_location_form").reset();
	}

</script>


@endsection
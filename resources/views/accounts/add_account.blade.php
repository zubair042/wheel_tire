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
					<h1 style="padding: 0;margin: 0 8px;font-size: 24px;color: #2679b5;">Accounts<small> <i class="icon-arrow-right5"></i>Add New</small></h1>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<hr align="left" >
				</div>
			</div>
			<form method="post" action="{{ route('save_accounts')}}" id="add_accounts_form" >
				{{ csrf_field() }}
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
						
						<select class="select_select2" name="account_type">
						@foreach($account_type as $type)
							 <!-- <option value="{{ $type->id }}"><span>{{ $type->description }}</span></option> -->
						@endforeach
			                <option value="Database"><span>Database</span></option>
			                <option value="Vendor">Vendor</option>
			                <option value="Customer">Customer</option>
			            </select>
			    	</div>
			    </div>
			    <!-- <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Package</span>
					</div>
					<div class="col-md-3">
						<select class="select_select2" name="position_at_company">
			                <option value=""><span>Basic Package | 1</span></option>
			                <option value="">Medium Package | 2</option>
			            </select>
			    	</div>
			    </div> -->
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Company Name</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="company_name" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Address</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="address" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Address 2</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="address2" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">City</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="city" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">State</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="state" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Zip</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="zip" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Phone</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="phone" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Fax</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="fax" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Email</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="email" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Notes</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="note" id="" class="form-control">
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
			    		<button type="submit" style="background-color: #4f99c6!important;margin-right: 12px;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Submit</button>
			    		<button type="button" style="background-color: #8b9aa3!important;margin-left: 12px;" class="btn btn-primary legitRipple" onclick="resetForm();" ><i class="icon-reset mr-2"></i>Reset</button>
			    	</div>
			    </div>
		    </form>
		</div>
	</div>
</div>


<script type="text/javascript">

	$('.form-check-input-switch').bootstrapSwitch();
	$('.select_select2').select2({
	    minimumResultsForSearch: Infinity
	});

	function resetForm() {
		//alert();
    	document.getElementById("add_accounts_form").reset();
	}

</script>

@endsection
@extends('layouts.app')

@section('content')

<div class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="card" style="padding: 12px;">
				<div class="row">
					<div class="col-md-9 offset-md-3">
						<hr align="left" width="70%">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 offset-md-3" style=" margin-top: 30px;">
						<div class="form-check form-check-switchery form-check-inline form-check-right">
							<label class="form-check-label">
								<input type="checkbox" class="form-check-input-switchery" checked="" data-fouc="" data-switchery="true" style="display: none;"><span class="switchery switchery-default" style="background-color: rgb(100, 189, 99); border-color: rgb(100, 189, 99); box-shadow: rgb(100, 189, 99) 0px 0px 0px 10px inset; transition: border 0.4s ease 0s, box-shadow 0.4s ease 0s, background-color 1.2s ease 0s;"><small style="left: 18px; background-color: rgb(255, 255, 255); transition: background-color 0.4s ease 0s, left 0.2s ease 0s;"></small></span>
								<p style="font-size: 18px;">Activation</p>
							</label>
						</div>
					</div>
				</div>
				<div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Customer</span>
					</div>
					<div class="col-md-3">
						<select class="custom-select" name="position_at_company">
			                <option value="Manager"><span>Choose a customer</span></option>
			                <option value="Manager"><span>Manager</span></option>
			                <option value="Worker">Worker</option>
			                <option value="Salesman">Salesman</option>
			            </select>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-2 offset-md-3">
						<span class="input-group-text" style="font-size: 18px;">Location Name</span>
					</div>
					<div class="col-md-3">
						<input type="text" name="lbs_weight" id="" class="form-control">
			    	</div>
			    </div>
			    <div class="row">
					<div class="col-md-9 offset-md-3">
						<hr align="left" width="70%">
					</div>
				</div>
				<div class="row" style="text-align: center;margin:30px 0;">
			    	<div class="col-md-9 offset-md-1">
			    		<button type="button" style="background-color: #4f99c6!important;margin-right: 12px;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Submit</button>
			    		<button type="button" style="background-color: #8b9aa3!important;margin-left: 12px;" class="btn btn-primary legitRipple"><i class="icon-reset mr-2"></i>Reset</button>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>

@endsection
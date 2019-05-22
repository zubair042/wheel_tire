	@extends('layouts.app')

@section('content')
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<form id="trailer_powerunit" method="POST" action="{{ route('save_reports') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group mb-3 mb-md-2" style="text-align: center; margin-top: 40px;">
					<div class="form-check form-check-inline form-check-right">
						<label class="form-check-label">
							<span class="font-weight-semibold">TRAILER</span>
							<div class=""><span class=""><input type="radio" id="trailer_radio" class="form-check-input-styled-danger" name="vehicle_type" value="trailer" checked="" data-fouc=""></span></div>
						</label>
					</div>
					<div class="form-check form-check-inline form-check-right">
						<label class="form-check-label">
							<span class="font-weight-semibold">POWER UNIT</span>
							<div class=""><span class="checked"><input type="radio" id="power_unit_radio" class="form-check-input-styled-danger" name="vehicle_type" value="power_unit" data-fouc=""></span></div>
						</label>
					</div>
				</div>
				<div class="row" id="trailer_html" style="display:none;margin-top: 10px;padding: 12px;">
					<div class="row" style="width: 100%; margin-left: 0px;">
						<div class="col-md-12" style="background-color: #fafafa;">
							<div class="col-md-8 offset-md-2" style="background-color: #fafafa;">
								<div class="" style="text-align: center; padding-top: 30px;">
									<h5>SELECT WHEEL POSITION YOU WORKED ON</h5>
								</div>
								<li class="media">
									<div class="mr-3 align-self-center" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span style="font-size: 15px; text-align: right;">Left Steer Wheel Position</span>
												<input type="radio" id="power_unit_radio" class="form-check-input-styled-danger" checked="" name="small_wheel" value="LS" data-fouc="">
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
									 	<img src="{{asset('global_assets/images/placeholders/fr1.png')}}" width="80%" height="100%" alt="">
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="radio" class="form-check-input-styled-danger" name="small_wheel" value="RS" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Steer Wheel Position</span>
											</label>
										</div>
									</div>
								</li>
								<li class="media">
									<div class="mr-3 align-self-center" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span style="font-size: 15px; text-align: right;">Left Front Wheel Position</span>
												<input type="radio" id="power_unit_radio" class="form-check-input-styled-danger" checked="" name="front_wheel" value="LF" data-fouc="">
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
									 	<img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt="">
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="radio" class="form-check-input-styled-danger" name="front_wheel" value="RF" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Front Wheel Position</span>
											</label>
										</div>
									</div>
								</li>
								<li class="media">
									<div class="mr-3 align-self-center" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span style="font-size: 15px; text-align: right;">Left Rear Wheel Position</span>
												<input type="radio" id="power_unit_radio" class="form-check-input-styled-danger" name="rear_wheel" value="LR" data-fouc="" checked="">
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
										<img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt="">
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="radio" class="form-check-input-styled-danger" name="rear_wheel" value="RR" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Rear Wheel Position</span>
											</label>
										</div>
									</div>
								</li>
								<div class="" style="text-align: center; padding-top: 30px; padding-bottom: 10px;">
									<h5>If you pull the hub you MUST take photo of completed wheel-end!</h5>
								</div>	
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="power_unit_html" style="margin-top: 10px;padding: 12px;">
					<div class="row" style="width: 100%; margin-left: 0px;">
						<div class="col-md-12" style="background-color: #fafafa;">
							<div class="col-md-8 offset-md-2" style="background-color: #fafafa;">
								<div class="" style="text-align: center; padding-top: 30px;">
									<h5>SELECT WHEEL POSITION YOU WORKED ON</h5>
								</div>
								<li class="media">
									<div class="mr-3 align-self-center" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span style="font-size: 15px; text-align: right;">Left Front Wheel Position</span>
												<input type="radio" id="power_unit_radio" class="form-check-input-styled-danger" checked="" name="front_wheel" value="LF" data-fouc="">
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
									 	<img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt="">
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="radio" class="form-check-input-styled-danger" name="front_wheel" value="RF" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Front Wheel Position</span>
											</label>
										</div>
									</div>
								</li>
								<li class="media">
									<div class="mr-3 align-self-center" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span style="font-size: 15px; text-align: right;">Left Rear WHeel Position</span>
												<input type="radio" id="power_unit_radio" class="form-check-input-styled-danger" name="rear_wheel" value="LR" data-fouc="" checked="">
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
										<img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt="">
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="radio" class="form-check-input-styled-danger" name="rear_wheel" value="RR" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Rear Wheel Position</span>
											</label>
										</div>
									</div>
								</li>
								<div class="" style="text-align: center; padding-top: 30px; padding-bottom: 10px;">
									<h5>If you pull the hub you MUST take photo of completed wheel-end!</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			    <div class="row">
			    	<div class="col-md-12" style="text-align: center; margin-top: 40px; ">
			        	<h5>HOW MANY FOOT POUNDS DID YOU TIGHTED LUNG NUTS TO?</h5>
			    	</div>
			    </div>
			    <div class="row" style="padding: 15px">
			    	<div class="col-md-12">
			    		
				    <div class="row"">
				    	<div class="col-md-2 offset-md-5">
				    		<div class="input-group">
								<input type="text" name="weight" id="" class="form-control">
								<span class="input-group-append">
									<span class="input-group-text" style="font-family:arial black; color: gray; font-size: 20px;">lbs.</span>
								</span>
							</div>
				    	</div>
				    </div>
				    <div class="row" style="margin-top: 10px;">
				    	<div class="col-md-2 offset-md-5">
				    		<input type="text" name="unit_number" id="" class="form-control" placeholder="Unit Number">
				    	</div>
				    </div>
				    <div class="row" style="margin-top: 10px;">
				    	<div class="col-md-2 offset-md-5">
				    		<input type="text" name="name" id="" class="form-control" placeholder="Your Name">
				    	</div>
				    </div>
				    <div class="row" style="margin-top: 10px;">
				    	<div class="col-md-2 offset-md-5">
				    		<select name="position_at_company" class="select_select2_select">
				    			<option disabled selected hidden>Select Manager</option>
				    			@if(count($manager_detail) > 0)
				    				@foreach($manager_detail as $manager)
				    					<option value="Manager"><span>{{ $manager->first_name." ".$manager->last_name }}</span></option>
				    				@endforeach
				    			@endif
				    	</div>
				    </div>
				    <div class="row" style="margin-top: 10px;">
				    	<div class="col-md-2 offset-md-5">
				    		<input type="text" name="comments" id="" class="form-control" placeholder="Comments">
				    	</div>
				    </div>
				    <div class="row" style="text-align: center;margin:30px 0;">
				    	<div class="col-md-12" style="text-align: center;">
				    		<button type="submit" style="background-color: #4f99c6!important;margin-right: 12px;" class="btn btn-primary legitRipple"><i class="icon-checkmark mr-2"></i>Submit</button>
						</button>
				    	</div>
				    </div>
			    </div>
			    </div>
			</form>
		</div>
	</div>
</div>

<script type="text/javascript">
	$('.form-check-input-styled-danger').uniform({
        wrapperClass: 'border-danger-600 text-danger-800'
    });
    $('#trailer_radio').click(function(){
        if($("#trailer_html").css("display","block")){
            $("#trailer_html").css("display","none");
            $("#power_unit_html").css("display","block");
        }
    });
    $('#power_unit_radio').click(function(){
        if($("#trailer_html").css("display","none")){
            $("#trailer_html").css("display","block");
            $("#power_unit_html").css("display","none");
        }
    });
    $('.select_select2_select').select2({
	    minimumResultsForSearch: Infinity
	});
</script>

@endsection 
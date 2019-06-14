@extends('layouts.app')

@section('content')
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/buttons/spin.min.js') }} "></script>
<script src="{{ asset('global_assets/js/plugins/buttons/ladda.min.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/components_buttons.js') }}"></script>

<style type="text/css">
	.chooseImage{
		float: left;
		width: 20%;
		margin: 0 4%;
	}
	.img-width{
		width: 29%;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="card card-body">
			<form id="trailer_powerunit" method="POST" action="{{ route('save_reports') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="form-group mb-3 mb-md-2 text-center">
					<div class="form-check form-check-inline form-check-right">
						<label class="form-check-label">
							<span class="font-weight-semibold">TRAILER</span>
							<div class=""><span class=""><input type="radio" id="trailer_radio" class="form-check-input-styled-danger" name="vehicle_type" value="trailer" checked="" data-fouc=""></span></div>
						</label>
					</div>
					<div class="form-check form-check-inline form-check-right">
						<label class="form-check-label">
							<span class="font-weight-semibold">POWER UNIT</span>
							<div class=""><span class=""><input type="radio" id="power_unit_radio" class="form-check-input-styled-danger" name="vehicle_type" value="power_unit"  data-fouc=""></span></div>
						</label>
					</div>
				</div>
				<div class="row" id="power_unit_html" style="display:none; margin-top: 10px;padding: 12px;">
					<div class="row">
						<div class="col-md-12" style="background-color: #fafafa;">
							<div class="col-md-8 offset-md-2">
								<div class="text-center">
									<h5>SELECT WHEEL YOU WORKED ON</h5>
								</div>
								<li class="media">
									<div class="mr-3 align-self-center img-width text-right">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span class="font-size-lg">Left Steer Wheel</span>
												<input type="checkbox" class="form-check-input-styled-danger" name="power_unit_left_stear" value="1" data-fouc="">
											</label>
										</div>
									</div>

									<div class="media-body text-center">
									 	<!-- <img src="{{asset('global_assets/images/placeholders/fr1.png')}}" width="82%" height="100%" alt=""> -->
									 	<a href="javascript:;">
									 		<input type="image" name="power_unit_left_stear" style="width: 15%" class="chooseImage" src="{{asset('global_assets/images/tire1.jpg')}}">
									 		<input type="file" name="power_unit_left_stear[]" id="power_unit_left_stear" class="d-none" multiple="">
									 		
									 	</a>
									 	<a href="javascript:;">
									 		<input type="image" name="power_unit_right_stear" style="width: 15%" class="chooseImage float-right" src="{{asset('global_assets/images/tire1.jpg')}}">
									 		<input type="file" name="power_unit_right_stear[]" id="power_unit_right_stear" class="d-none" multiple="">
									 	</a>
									</div>

									<div class="align-self-center ml-3 img-width">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled-danger" name="power_unit_right_stear" value="1" data-fouc="">&nbsp;&nbsp; <span class="font-size-lg">Right Steer Wheel</span>
											</label>
										</div>
									</div>
								</li>
								<li class="media">
									<div class="mr-3 align-self-center img-width text-right">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span class="font-size-lg">Left Front Wheel</span>
												<input type="checkbox" class="form-check-input-styled-danger"  name="power_unit_left_front" value="1" data-fouc="">
											</label>
										</div>
									</div>

									<div class="media-body text-center">
									 	<!-- <img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt=""> -->
									 	<a href="javascript:;">
									 		<input type="image" name="power_unit_left_front" style="width: 25%" class="chooseImage" src="{{asset('global_assets/images/tire_img.jpg')}}">
									 		<input type="file" name="power_unit_left_front[]" id="power_unit_left_front" class="d-none" multiple="">
									 	</a>
									 	<!-- <img src="{{asset('global_assets/images/line.png')}}" class=""  alt=""> -->
									 	<a href="javascript:;">
									 		<input type="image" name="power_unit_right_front" class="chooseImage float-right" style="width: 25%" src="{{asset('global_assets/images/tire_img.jpg')}}">
									 		<input type="file" name="power_unit_right_front[]" id="power_unit_right_front" class="d-none" multiple="">
									 	</a>
									</div>

									<div class="align-self-center ml-3 img-width">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled-danger" name="power_unit_right_front" value="1" data-fouc="">&nbsp;&nbsp; <span class="font-size-lg">Right Front Wheel</span>
											</label>
										</div>
									</div>
								</li>
								<li class="media form-group">
									<div class="mr-3 align-self-center img-width text-right">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span class="font-size-lg">Left Rear Wheel</span>
												<input type="checkbox" class="form-check-input-styled-danger" name="power_unit_left_rear" value="1" data-fouc="" >
											</label>
										</div>
									</div>

									<div class="media-body">
										<!-- <img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt=""> -->
										<a href="javascript:;">
									 		<input type="image" name="power_unit_left_rear" class="chooseImage" style="width: 25%" src="{{asset('global_assets/images/tire_img.jpg')}}">
									 		<input type="file" name="power_unit_left_rear[]" id="power_unit_left_rear" class="d-none" multiple="">
									 	</a>
									 	<a href="javascript:;">
									 		<input type="image" name="power_unit_right_rear" style="width: 25%" class="chooseImage float-right" src="{{asset('global_assets/images/tire_img.jpg')}}">
									 		<input type="file" name="power_unit_right_rear[]" id="power_unit_right_rear" class="d-none" multiple="">
									 	</a>
									</div>

									<div class="align-self-center ml-3 img-width">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled-danger" name="power_unit_right_rear" value="1" data-fouc="">&nbsp;&nbsp; <span class="font-size-lg">Right Rear Wheel</span>
											</label>
										</div>
									</div>
								</li>
								<div class="text-center">
									<h5>If you pull the hub you MUST take photo of completed wheel-end!</h5>
								</div>	
							</div>
						</div>
					</div>
				</div>
				<div class="row" id="trailer_html" style="margin-top: 10px;padding: 12px;">
					<div class="col-md-12" style="background-color: #fafafa;">
						<div class="col-md-8 offset-md-2">
							<div class="text-center">
								<h5>SELECT WHEEL YOU WORKED ON</h5>
							</div>
							<li class="media">
								<div class="mr-3 align-self-center img-width text-right">
									<div class="form-check form-check-inline form-check-right">
										<label class="form-check-label">
											<span class="font-size-lg">Left Front Wheel</span>
											<input type="checkbox" class="form-check-input-styled-danger" name="trailer_left_front" value="1" data-fouc="">
										</label>
									</div>
								</div>

								<div class="media-body text-center">
								 	<!-- <img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt=""> -->

								 	<a>
								 		<input type="image" name="trailer_left_front" class="chooseImage" style="width: 25%" src="{{asset('global_assets/images/tire_img.jpg')}}">
								 		<input type="file" name="trailer_left_front[]" id="trailer_left_front" class="d-none" multiple="">
								 	</a>
								 	<a href="javascript:;">
								 		<input type="image" name="trailer_right_front" class="chooseImage float-right" style="width: 25%" src="{{asset('global_assets/images/tire_img.jpg')}}">
								 		<input type="file" name="trailer_right_front[]" id="trailer_right_front" class="d-none" multiple="">
								 	</a>
								</div>

								<div class="align-self-center ml-3 img-width">
									<div class="form-check form-check-inline form-check-right">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled-danger" name="trailer_right_front" value="1" data-fouc="">&nbsp;&nbsp; <span class="font-size-lg">Right Front Wheel</span>
										</label>
									</div>
								</div>
							</li>
							<li class="media form-group">
								<div class="mr-3 align-self-center img-width text-right">
									<div class="form-check form-check-inline form-check-right">
										<label class="form-check-label">
											<span class="font-size-lg">Left Rear Wheel</span>
											<input type="checkbox" class="form-check-input-styled-danger" name="trailer_left_rear" value="1" data-fouc="">
										</label>
									</div>
								</div>

								<div class="media-body">
									<!-- <img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt=""> -->
									<a href="javascript:;">
										<input type="image" src="{{asset('global_assets/images/tire_img.jpg')}}" style="width: 25%" name="trailer_left_rear" class="chooseImage">
										<input type="file" name="trailer_left_rear[]" id="trailer_left_rear" class="d-none" multiple="">
									</a>
									<!-- <img src="{{asset('global_assets/images/line.png')}}"> -->
									<a href="javascript:;">
										<input type="image" src="{{asset('global_assets/images/tire_img.jpg')}}" style="width: 25%" name="trailer_right_rear" class="chooseImage float-right">
										<input type="file" name="trailer_right_rear[]" id="trailer_right_rear" class="d-none" multiple="">
									</a>
								</div>

								<div class="align-self-center ml-3 img-width">
									<div class="form-check form-check-inline form-check-right">
										<label class="form-check-label">
											<input type="checkbox" class="form-check-input-styled-danger" name="trailer_right_rear" value="1" data-fouc="">&nbsp;&nbsp; <span class="font-size-lg">Right Rear Wheel</span>
										</label>
									</div>
								</div>
							</li>
							<div class="text-center">
								<h5>If you pull the hub you MUST take photo of completed wheel-end!</h5>
							</div>
						</div>
					</div>
					
				</div>
			    <div class="row text-center">
			    	<div class="col-md-12">
			        	<h5>HOW MANY FOOT POUNDS DID YOU TIGHTED LUNG NUTS TO?</h5>
			    	</div>
			    </div>
			    <div class="row">
			    	<div class="col-md-12">
					    <div class="row form-group">
					    	<div class="col-md-2 offset-md-5">
					    		<div class="input-group">
									<input type="text" name="weight"  class="form-control" required="">
									<span class="input-group-append">
										<span class="input-group-text" style="font-family:arial black; color: gray; font-size: 20px;">lbs.</span>
									</span>
								</div>
					    	</div>
					    </div>
					    <div class="row form-group">
					    	<div class="col-md-2 offset-md-5">
					    		<input type="text" name="unit_number" class="form-control" placeholder="Unit Number" required="">
					    	</div>
					    </div>
					    <div class="row form-group">
					    	<div class="col-md-2 offset-md-5">
					    		<input type="text" name="name" class="form-control" placeholder="Your Name" required="">
					    	</div>
					    </div>
					    <div class="row form-group">
					    	<div class="col-md-2 offset-md-5">
					    		<select name="manager_id" onchange="getLocationById()" id="manager_id" class="select_select2_select">
					    			<option disabled selected hidden>Select Manager</option>
					    			@if(count($manager_detail) > 0)
					    				@foreach($manager_detail as $manager)
					    					<option value="{{ $manager->id }}"><span>{{ $manager->first_name." ".$manager->last_name }}</span></option>
					    				@endforeach
					    			@endif
					    		</select>
					    	</div>
					    </div>
					    <div class="row form-group">
					    	<div class="col-md-2 offset-md-5">
					    		<select name="location_id" id="manager-location" class="select_select2_select">
					    			<option disabled selected hidden>Select Location</option>
					    		</select>
					    		<!-- <input type="text" name="location_id" id="manager-location" class="form-control" placeholder=""> -->
					    	</div>
					    </div>

					    <div class="row form-group">
					    	<div class="col-md-2 offset-md-5">
					    		<input type="text" name="comments" class="form-control" placeholder="Comments">
					    	</div>
					    </div>

					    <div class="row text-center">
					    	<div class="col-md-12">
					    		<button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal_full">Launch <i class="icon-play3 ml-2"></i></button>
					    		<button type="submit" class="btn btn-primary btn-ladda btn-ladda-spinner" data-style="expand-right" id="submit123" data-spinner-color="#ffff"
					    		onclick="spinner();"><i class="icon-checkmark mr-2"></i>Submit</button>
					    	</div>
					    </div>
			    	</div>
			    </div>
			</form>
		</div>
	</div>
</div>

<div id="modal_full" class="modal fade" tabindex="-1">
					<div class="modal-dialog modal-full">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title font-weight-semibold">Confirm Report</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>

							<div class="modal-body">
								<h6 class="font-weight-semibold">Text in a modal</h6>
								<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>

								<hr>

								<h6 class="font-weight-semibold">Another paragraph</h6>
								<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
								<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
							</div>

							<div class="modal-footer">
								<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
								<button type="button" class="btn bg-primary">Save changes</button>
							</div>
						</div>
					</div>
				</div>

<input type="hidden" value="{{ csrf_token() }}" id="csrf-token">
<script type="text/javascript">

$("#submit1232222").on("click", function(){
	var l = Ladda.create( document.querySelector( '#submit' ) );
	l.start();
	// setTimeout(function(){
	// 	l.stop();
	// }, 3000);
})
	function spinner(){
		var l = Ladda.create( document.querySelector('#submit') );
		l.start();
	}

	$('.form-check-input-styled-danger').uniform({
        wrapperClass: 'border-danger-600 text-danger-800'
    });

    $('#trailer_radio').click(function(){
    	if ($('#power_unit_html').css("display","block")) {
	        $("#trailer_html").css("display","block");
	        $("#power_unit_html").css("display","none");
	    }
    });

    $('#power_unit_radio').click(function(){
    	if ($('#trailer_html').css("display","block")) {
	        $("#trailer_html").css("display","none");
	        $("#power_unit_html").css("display","block");
	    }
    });

    $('.select_select2_select').select2({
	    minimumResultsForSearch: Infinity
	});

	function getLocationById(){
		var id = $('#manager_id').val();
		//$("#manager-location").select2("val","");
		$.ajax({
			type: "post",
			url: "{{ route('manager-location') }}",
			data: {id: id, "_token": "{{ csrf_token() }}"},
			success:function(d){
				$('#manager-location').html('').select({data: []});
				for (var i = 0; i <= d.length; i++) {
					var id = d[i].id;
					var name = d[i].location_name;
					var option = new Option(name,id,false,false);
					$("#manager-location").append(option).trigger('change');
					//$('#manager-location').val($('#manager-location').val() + name);
				}
			}
		})
	}

	$(".chooseImage").on("click", function(e){
		var name = $(this).attr("name");
		$("#"+name+"").click();	
		e.preventDefault();
	});

	$(".chooseImage").next("input").on("change", function(){
		var inp_name = $(this).attr("id");
		$('input[name='+inp_name+']').prop('checked',true);
		$.uniform.update('input[name='+inp_name+']');
	});

	
</script>



@endsection 
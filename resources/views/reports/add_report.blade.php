@extends('layouts.app')

@section('content')
<script src="{{asset('global_assets/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
<style type="text/css">
	.chooseImage{
		float: left;
		width: 20%;
		margin: 0 4%;

	}
</style>
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
												<input type="checkbox"  class="form-check-input-styled-danger"  name="small_wheel" value="LS" data-fouc="">
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
									 	<img src="{{asset('global_assets/images/placeholders/fr1.png')}}" width="82%" height="100%" alt="">
									 	<a href="javascript:;">
									 		<input type="image" name="power_unit_left_stear" class="chooseImage" src="{{asset('global_assets/images/image.png')}}">
									 		
									 		<input type="file" name="power_unit_left_stear[]" id="power_unit_left_stear" class="uploadImages" style="display: none;" multiple="">
									 		
									 	</a>
									 	<a href="javascript:;">
									 		<input type="image" style="float: right;" name="power_unit_right_stear" class="chooseImage" src="{{asset('global_assets/images/image.png')}}">
									 		<input type="file" name="power_unit_right_stear[]" id="power_unit_right_stear" class="uploadImages" style="display: none;" multiple="">
									 	</a>
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled-danger" name="small_wheel" value="RS" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Steer Wheel Position</span>
											</label>
										</div>
									</div>
								</li>
								<li class="media">
									<div class="mr-3 align-self-center" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span style="font-size: 15px; text-align: right;">Left Front Wheel Position</span>
												<input type="checkbox" class="form-check-input-styled-danger"  name="front_wheel" value="LF" data-fouc="">
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
									 	<img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt="">
									 	<a href="javascript:;">
									 		<input type="image" name="power_unit_left_front" class="chooseImage" src="{{asset('global_assets/images/image.png')}}">
									 		<input type="file" name="power_unit_left_front[]" id="power_unit_left_front" class="uploadImages" style="display: none;" multiple="">
									 	</a>
									 	<a href="javascript:;">
									 		<input type="image" style="float: right;" name="power_unit_right_front" class="chooseImage" src="{{asset('global_assets/images/image.png')}}">
									 		<input type="file" name="power_unit_right_front[]" id="power_unit_right_front" class="uploadImages" style="display: none;" multiple="">
									 	</a>
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled-danger" name="front_wheel" value="RF" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Front Wheel Position</span>
											</label>
										</div>
									</div>
								</li>
								<li class="media">
									<div class="mr-3 align-self-center" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span style="font-size: 15px; text-align: right;">Left Rear Wheel Position</span>
												<input type="checkbox" class="form-check-input-styled-danger" name="rear_wheel" value="LR" data-fouc="" >
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
										<img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt="">
										<a href="javascript:;">
									 		<input type="image" name="power_unit_left_rear" class="chooseImage" src="{{asset('global_assets/images/image.png')}}">
									 		<input type="file" name="power_unit_left_rear[]" id="power_unit_left_rear" class="uploadImages" style="display: none;" multiple="">
									 	</a>
									 	<a href="javascript:;">
									 		<input type="image" style="float: right;" name="power_unit_right_rear" class="chooseImage" src="{{asset('global_assets/images/image.png')}}">
									 		<input type="file" name="power_unit_right_rear[]" id="power_unit_right_rear" class="uploadImages" style="display: none;" multiple="">
									 	</a>
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled-danger" name="rear_wheel" value="RR" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Rear Wheel Position</span>
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
												<input type="checkbox" class="form-check-input-styled-danger"  name="front_wheel" value="LF" data-fouc="">
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
									 	<img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt="">

									 	<a href="javascript:;">
									 		<input type="image" name="trailer_left_front" class="chooseImage" src="{{asset('global_assets/images/image.png')}}">
									 		<input type="file" name="trailer_left_front[]" id="trailer_left_front" class="uploadImages" style="display: none;" multiple="">
									 	</a>
									 	<a href="javascript:;">
									 		<input type="image" style="float: right;" name="trailer_right_front" class="chooseImage" src="{{asset('global_assets/images/image.png')}}">
									 		<input type="file" name="trailer_right_front[]" id="trailer_right_front" class="uploadImages" style="display: none;" multiple="">
									 	</a>
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled-danger" name="front_wheel" value="RF" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Front Wheel Position</span>
											</label>
										</div>
									</div>
								</li>
								<li class="media">
									<div class="mr-3 align-self-center" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<span style="font-size: 15px; text-align: right;">Left Rear Wheel Position</span>
												<input type="checkbox" class="form-check-input-styled-danger" name="rear_wheel" value="LR" data-fouc="">
											</label>
										</div>
									</div>

									<div class="media-body" style="text-align: center;">
										<img src="{{asset('global_assets/images/placeholders/fr.png')}}" class="" width="100%" height="100%" alt="">
										<a href="javascript:;">
											<input type="image" src="{{asset('global_assets/images/image.png')}}" name="trailer_left_rear" class="chooseImage">
											<input type="file" name="trailer_left_rear[]" id="trailer_left_rear" class="uploadImages" style="display: none;" multiple="">
										</a>
										<a href="javascript:;">
											<input type="image" style="float: right;" src="{{asset('global_assets/images/image.png')}}" name="trailer_right_rear" class="chooseImage">
											<input type="file" name="trailer_right_rear[]" id="trailer_right_rear" class="uploadImages" style="display: none;" multiple="">
										</a>
									</div>

									<div class="align-self-center ml-3" style="width: 29%;">
										<div class="form-check form-check-inline form-check-right">
											<label class="form-check-label">
												<input type="checkbox" class="form-check-input-styled-danger" name="rear_wheel" value="RR" data-fouc="">&nbsp;&nbsp; <span style="font-size: 15px;">Right Rear Wheel Position</span>
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
			    		
				    <div class="row">
				    	<div class="col-md-2 offset-md-5">
				    		<div class="input-group">
								<input type="text" name="weight"  class="form-control" required="">
								<span class="input-group-append">
									<span class="input-group-text" style="font-family:arial black; color: gray; font-size: 20px;">lbs.</span>
								</span>
							</div>
				    	</div>
				    </div>
				    <div class="row" style="margin-top: 10px;">
				    	<div class="col-md-2 offset-md-5">
				    		<input type="text" name="unit_number" id="" class="form-control" placeholder="Unit Number" required="">
				    	</div>
				    </div>
				    <div class="row" style="margin-top: 10px;">
				    	<div class="col-md-2 offset-md-5">
				    		<input type="text" name="name" id="" class="form-control" placeholder="Your Name" required="">
				    	</div>
				    </div>
				    <div class="row" style="margin-top: 10px;">
				    	<div class="col-md-2 offset-md-5">
				    		<select name="manager_id" id="manager_id" class="select_select2_select" onchange="getLocationById()">
				    			<option disabled selected hidden>Select Manager</option>
				    			@if(count($manager_detail) > 0)
				    				@foreach($manager_detail as $manager)
				    					<option value="{{ $manager->id }}"><span>{{ $manager->first_name." ".$manager->last_name }}</span></option>
				    				@endforeach
				    			@endif
				    		</select>
				    	</div>
				    </div>
				    <div class="row" style="margin-top: 10px;">
				    	<div class="col-md-2 offset-md-5">
				    		<select name="location_id" id="manager-location" class="select_select2_select">
				    			<option disabled selected hidden>Select Location</option>
				    		</select>
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
<input type="hidden" value="{{ csrf_token() }}" id="csrf-token">
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
					//$("#manager-location").append($("<option/>").val(id).text(name));

				}
			}
		})
	}

	

	$('.uploadImages').on('change',function(e){
		
		//e.preventDefault();
		var name = $(this).attr('name');
		// var formD = new FormData();
		// formD.append('file', $(this)[0].files);

		let formD = new FormData();
	    let TotalImages = $(this)[0].files.length;  //Total Images
	    let images = $(this)[0];  

	    for (let i = 0; i < TotalImages; i++) {
	        formD.append('file', images.files[i]);
	    }
	    formD.append('files', TotalImages);

		formD.append("name",name);

		$.ajax({
			url: "{{ route('save_reports') }}",
			type: "post",
			data: formD,
			contentType: false,
	        cache: false,
	        headers: {'X-CSRF-TOKEN': $('#csrf-token').val()},
	   		processData:false,
	   		success:function(data){
	   			console.log(data);
	   		}
		})
	});
	$(".chooseImage").on("click", function(e){
		var name = $(this).attr("name");
		$("#"+name+"").click();
	})
</script>

@endsection 
@extends('layouts.app')

@section('content')

<?php 
	$main_image = '';
	if (count($images) > 0) {
		foreach ($images as $image) { 
			if ($image->image_type == 'main_image'){
				$main_image = $image->url;
				break;
			}
		}
	}
?>	
<?php //echo "<pre>";print_r($report_detail);exit; ?>
<script src="{{asset('global_assets/js/plugins/media/fancybox.min.js') }}"></script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="col-md-12">
					<a href="{{ url('reports') }}"><button type="button" class="btn btn-outline-success legitRipple"><i class="icon-arrow-left8 mr-2"></i>Back</button></a>
					&nbsp;&nbsp;
					<span class="font-weight-semibold" style="font-size: 30px;">Wheel/Tire Installation Report</span>
					<?php if ($user->user_role == 3 && $report_detail->signature == 0) { ?>
						<a href="javascript:;" type="button"  class="btn btn-danger float-right" onclick="delete_report(<?php echo $report_detail->id; ?>)" >Delete</a>
					<?php } ?>
					
					<span class="font-weight-semibold float-right text-primary font-size-lg" style="margin: 8px">ID: {{ $report_detail->id }}</span>
					<input type="hidden" value={{ $report_detail->id }} id="reportId">
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8">
						<a href="#" class="d-inline-block" id="upload_image">
							<?php if($main_image == ''){ ?>
								<img src="{{asset('')}}global_assets/images/placeholders/cover.jpg" id="static_image" class="img-fluid" alt="">
							<?php } 
							else { ?>
								<img src=<?php echo $main_image ?> id="static_image" class="img-fluid" alt="">
							<?php 
							}
							?>
						</a>
						<div class="card" style="margin-top:12px;">
							<div class="card-header">
								<div class="row">
									<div class="col-md-9">
										<h6 class="card-title text-secondary">Comments:</h6>
									</div>
									<div class="col-md-3">
										<?php if($user->user_role == 3 && $main_image=='') { ?>
											<input type="file" name="" id="imageToUpload">
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="card-body">
								@if(count($comments) > 0)
								@foreach($comments as $comment)
								<span class="text-primary font-weight-semibold">{{ $comment->first_name." ".$comment->last_name}} : </span><span>{{ $comment->comments }}</span><br>
								@endforeach
								@endif
								
							</div>
						</div>
					</div>
					<div class="col-md-4" style="margin-top: 5px;">
						<label class="font-weight-black">Work Performed By:</label>
						<p>{{ $report_detail->name }}</p>
						<label class="font-weight-black">Unit Number:</label>
						<p>{{ $report_detail->report_unit_num }}</p>
						<label class="font-weight-black">Location:</label>
						<p> {{ $report_detail->location_name }} </p>
						<label class="font-weight-black">Wheel Lug Nuts Torqued To:</label>
						<p>{{ $report_detail->weight }} Lbs</p>
						<label class="font-weight-black">Second Signature:</label>
						<p>{{ $report_detail->first_name." ".$report_detail->last_name }}</p>
						<label class="font-weight-black">Tech Comment:</label>
						<p>{{$report_detail->comment}}</p>
						
						<?php if ($user->user_role == 2 || $user->user_role == 3) { ?>
							<?php if ($report_detail->signature != 1) { ?>

							<a href="javascript:;" type="button" id="signature_btn"  class="btn btn-primary rounded-round legitRipple"<?php if ($user->user_role == 3) { ?>
							 onclick="add_signature(<?php echo $report_detail->id; ?>)"
							<?php } ?> >
								Apply Signature</a>

							<?php } ?>
						
						<button type="button" class="btn btn-danger rounded-round legitRipple" 
						<?php if ($user->user_role == 2 || $user->user_role == 3) { ?>
							data-toggle="modal" data-target="#modal_comment"
						<?php } ?>>
							Add Comment</button>

						<?php } ?> 
					</div>
				</div>
				
				<?php if ($report_detail->vehicle_type == 'power_unit') { ?>
					<div class="card" style="margin-top: 8px;background: #63af81">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12" style="text-align: center;color: #f9f9f9;">
									<h4 class="font-weight-semibold" >STEER WHEEL POSITION</h4>
								</div>
							</div>
							<div class="row">
								<?php if (count($images) > 0) {
									foreach ($images as $image) { 
										if ($image->image_type == 'power_unit_left_stear' || $image->image_type == 'power_unit_right_stear'){ ?>
											<div class="col-md-3">
												<div class="card-img-actions m-1">
													<img class="card-img img-fluid" src="{{ $image->url }}" alt="">
													<div class="card-img-actions-overlay card-img">
														<a href="{{ $image->url }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
															<i class="icon-plus3"></i>
														</a>
													</div>
												</div>
											</div>
								<?php	}
									}
								} ?>
							</div>
						</div>
					</div>
				<?php } ?>

				<div class="card" style="margin-top: 8px;background: #63af81">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12" style="text-align: center;color: #f9f9f9;">
								<h4 class="font-weight-semibold" >FRONT WHEEL POSITION</h4>
							</div>
						</div>
						<div class="row">
							<?php if (count($images) > 0) {
								foreach ($images as $image) { 
									if ($image->image_type == 'trailer_left_front' || $image->image_type == 'trailer_right_front'  || $image->image_type == 'power_unit_left_front'  || $image->image_type == 'power_unit_right_front'){ ?>
										<div class="col-md-3">
											<div class="card-img-actions m-1">
												<img class="card-img img-fluid" src="{{ $image->url }}" alt="">
												<div class="card-img-actions-overlay card-img">
													<a href="{{ $image->url }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
														<i class="icon-plus3"></i>
													</a>
												</div>
											</div>
										</div>
							<?php	}
								}
							} ?>
						</div>
					</div>
				</div>
				<div class="card" style="margin-top: 8px;background: #63af81">
					<div class="card-body">
						<div class="row">
							<div class="col-md-12" style="text-align: center;color: #f9f9f9;">
								<h4 class="font-weight-semibold">REAR WHEEL POSITION</h4>
							</div>
						</div>
						<div class="row">
							<?php if (count($images) > 0) {
								foreach ($images as $image) { 
									if ($image->image_type == 'trailer_right_rear' || $image->image_type == 'trailer_left_rear' || $image->image_type == 'power_unit_left_rear' || $image->image_type == 'power_unit_right_rear'){ ?>
										<div class="col-md-3">
											<div class="card-img-actions m-1">
												<img class="card-img img-fluid" src="{{ $image->url }}" alt="">
												<div class="card-img-actions-overlay card-img">
													<a href="{{ $image->url }}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
														<i class="icon-plus3"></i>
													</a>
												</div>
											</div>
										</div>
							<?php	}
								}
							} ?>
						</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>


<div id="modal_comment" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<form method="post" action="{{ route('add_comment') }}">
			<input type="hidden" name="report_id" value="{{ $report_detail->id}}">
			{{ csrf_field() }}
			<div class="modal-content">
				<div class="modal-body">
					<h6 class="font-weight-semibold">Add a comment</h6>
					<div class="form-group row">
						<div class="col-lg-12">
							<textarea rows="3" cols="3" name="comments" class="form-control" placeholder="Write your comments.."></textarea>
						</div>
					</div>
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-link" data-dismiss="modal">Cancel</button>
					<button type="submit" class="btn bg-primary">Add</button>
				</div>
			</div>
		</form>
	</div>
</div>

<input type="hidden" value="{{ csrf_token() }}" id="csrf-token">

<script type="text/javascript">
	$('[data-popup="lightbox1"]').fancybox({
		padding: 3
	});
	// $('.form-control-uniform-custom').uniform({
 //            fileButtonClass: 'action btn bg-blue',
 //            selectClass: 'uniform-select bg-pink-400 border-pink-400'
 //        });
function add_signature(id){
 	if (confirm('Are you sure you want to Add Signature')) {
		$.ajax({
			type: "post",
			url: "{{ route('signature') }}",
			data: {'id': id, "_token": "{{ csrf_token() }}"},
			success:function(data){
				alert('Signature added successfully!');
				$('#signature_btn').hide();
				// location.reload();
			}
		})
	}else{
		alert('Signature Cancel');
	}
}

$('#file').on('click',function(e){
	e.preventDefault();
	// alert("dhgdf");
	// var form_data = new FormData($('#file')[0]);
	// form_data.append("file", file);
	// console.log(form_data);
	var property = $('#file').prop('files')[0];
	var image_name = property.name;
	var image_extention = image_name.split('.').pop().toLowerCase();
	if (jQuery.inArray(image_extention, ['gif','png','jpg','jpeg']) == -1) {
		alert("Invalid image file");
	}else{
		form_data = new FormData();
		form_data.append('file',property);
		console.log(form_data);
	}
	
});

$('#imageToUpload').on('change',function(e){
		
		//e.preventDefault();
		var name = $(this).attr('name');
		var reportId = $("#reportId").val();
		var formD = new FormData();
		formD.append('file', $(this)[0].files[0]);
		formD.append("name",name);
		formD.append("report_id",reportId);
		formD.append("image_type","main_image");
		$.ajax({
			url: "{{ route('add_image') }}",
			type: "post",
			data: formD,
			contentType: false,
	        cache: false,
	        headers: {'X-CSRF-TOKEN': $('#csrf-token').val()},
	   		processData:false,
	   		success:function(data){
				   $('#upload_image').html(data.image);
				   $('#static_image').hide();
				   // console.log(data);
				  // $("#uploadedImage").html(data);
	   		}
		})
	});

	function delete_report(id){
		if (confirm('Are you sure you want to Delete Report')) {
		$.ajax({
			type: "post",
			url: "{{ route('delete_report') }}",
			data: {'id': id, "_token": "{{ csrf_token() }}"},
			success:function(data){
				alert('Report Deleted successfully!');
				window.location.replace('{{ url("/reports")}}');
			}
		})
	}else{
		alert('Report Canceled');
	}
	}
</script>

@endsection
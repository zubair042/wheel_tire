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

<script src="{{asset('global_assets/js/plugins/media/fancybox.min.js') }}"></script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="col-md-12">
					<span class="font-weight-semibold" style="font-size: 30px;">Wheel/Tire Installation Report</span>
					<span class="font-weight-semibold" style="float: right;color: #5543e8;font-size: 15px;">ID: {{ $report_detail->id }}</span>
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
								<img src=<?php echo $main_image?> id="static_image" class="img-fluid" alt="">
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
								<span class="text-primary font-weight-semibold">John Smith : </span><span>Torque wrench was missing</span>
								<br>
								<span class="text-success font-weight-semibold">Bob Jones : </span><span>John say the torque wrench was not in the shop</span>
							</div>
						</div>
					</div>
					<div class="col-md-4" style="margin-top: 5px;">
						<label class="font-weight-black">Work Performed By:</label>
						<p>{{ $report_detail->name }}</p>
						<label class="font-weight-black">Unit Number:</label>
						<p>{{ $report_detail->report_unit_num }}</p>
						<label class="font-weight-black">Location:</label>
						<p></p>
						<label class="font-weight-black">Wheel Lug Nuts Torqued To:</label>
						<p>{{ $report_detail->weight }} Lbs</p>
						<label class="font-weight-black">Second Signature:</label>
						<p>{{ $report_detail->first_name." ".$report_detail->last_name }}</p>
						<p><?php if (isset($comment->comments)) {echo $comment->comments ; } ?></p>
						<?php if ($user->user_role == 2 || $user->user_role == 3) { ?>
						<a href="javascript:;" type="button" class="btn btn-primary rounded-round legitRipple"<?php if ($user->user_role == 3) { ?>
							onclick="add_signature(<?php echo $report_detail->id; ?>)"
						<?php } ?> >
							Apply Signature</a>
						<button type="button" class="btn btn-danger rounded-round legitRipple" 
						<?php if ($user->user_role == 3) { ?>
							data-toggle="modal" data-target="#modal_comment"
						<?php } ?>>
							Add Comment</button>
						<?php } ?>
					</div>
				</div>

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
									if ($image->image_type == 'trailer_left_front' || $image->image_type == 'trailer_right_front'){ ?>
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
							<div class="row">
								<?php if (count($images) > 0) {
									foreach ($images as $image) { 
										if ($image->image_type == 'trailer_left_rear' || $image->image_type == 'trailer_right_rear'){ ?>
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
				location.reload();
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
				   console.log(data);
				  // $("#uploadedImage").html(data);
	   		}
		})
	});
</script>

@endsection
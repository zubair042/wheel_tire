@extends('layouts.app')

@section('content')

<script src="{{asset('global_assets/js/plugins/media/fancybox.min.js') }}"></script>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<div class="col-md-12">
					<span class="font-weight-semibold" style="font-size: 30px;">Wheel/Tire Installation Report</span>
					<span class="font-weight-semibold" style="float: right;color: #5543e8;font-size: 15px;">ID: {{ $report_detail->id }}</span>
				</div>
			</div>
			<div class="card-body">
				<div class="row">
					<div class="col-md-8">
						<a href="#" class="d-inline-block">
							<img src="{{asset('')}}global_assets/images/placeholders/cover.jpg" class="img-fluid" alt="">
						</a>
						<div class="card" style="margin-top:12px;">
							<div class="card-header">
								<h6 class="card-title text-secondary">Comments:</h6>
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
						<p></p>
						<p><?php if (isset($comment->comments)) {echo $comment->comments ; } ?></p>
						<?php if ($user->user_role == 2 || $user->user_role == 3) { ?>
						<a href="javascript:;" type="button" class="btn btn-primary rounded-round legitRipple"<?php if ($user->user_role == 3) { ?>
							onclick="add_signature(<?php echo $user->id; ?>)"
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
							<div class="col-md-9" style="text-align: center;color: #f9f9f9;">
								<h4 class="font-weight-semibold" > LEFT FRONT WHEEL POSITION</h4>
							</div>
							<div class="col-md-3">
								<form method="post" enctype="multipart/form-data" action="{{ url('/report/view/'.$report_detail->id ) }}">
									{{ csrf_field() }}
									<input type="file" name="file">
									<button type="submit" name="upload" >Upload</button>
								</form>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="card-img-actions m-1">
									<img class="card-img img-fluid" src="{{ asset('global_assets/images/placeholders/placeholder.jpg')}}" alt="">
									<div class="card-img-actions-overlay card-img">
										<a href="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
											<i class="icon-plus3"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-img-actions m-1">
									<img class="card-img img-fluid" src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" alt="">
									<div class="card-img-actions-overlay card-img">
										<a href="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
											<i class="icon-plus3"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-img-actions m-1">
									<img class="card-img img-fluid" src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" alt="">
									<div class="card-img-actions-overlay card-img">
										<a href="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
											<i class="icon-plus3"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-img-actions m-1">
									<img class="card-img img-fluid" src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" alt="">
									<div class="card-img-actions-overlay card-img">
										<a href="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
											<i class="icon-plus3"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="margin-top: 15px;">
							<div class="col-md-9" style="text-align: center;color: #f9f9f9;">
								<h4 class="font-weight-semibold" > RIGHT REAR WHEEL POSITION</h4>
							</div>
							<div class="col-md-3">
								<input type="file" name="file">
								<!-- <form method="post" action="">
									<input type="file" name="file">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<button type="submit" name="upload" >Upload</button>
								</form> -->
							</div>
						</div>
						<div class="row">
							<div class="col-md-3">
								<div class="card-img-actions m-1">
									<img class="card-img img-fluid" src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" alt="">
									<div class="card-img-actions-overlay card-img">
										<a href="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
											<i class="icon-plus3"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-img-actions m-1">
									<img class="card-img img-fluid" src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" alt="">
									<div class="card-img-actions-overlay card-img">
										<a href="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
											<i class="icon-plus3"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-img-actions m-1">
									<img class="card-img img-fluid" src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" alt="">
									<div class="card-img-actions-overlay card-img">
										<a href="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
											<i class="icon-plus3"></i>
										</a>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="card-img-actions m-1">
									<img class="card-img img-fluid" src="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" alt="">
									<div class="card-img-actions-overlay card-img">
										<a href="{{asset('global_assets/images/placeholders/placeholder.jpg')}}" class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" data-popup="lightbox1" rel="group">
											<i class="icon-plus3"></i>
										</a>
									</div>
								</div>
							</div>
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
				// alert('Signature added successfully!');
				// location.reload();
			}
		})
	}else{
		alert('Signature Cancel');
	}
 }
</script>

@endsection
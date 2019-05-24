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
								<apan class="text-primary font-weight-semibold">John Smith : </apan><span>Torque wrench was missing</span>
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
						<p>{{ $report_detail->comments }}</p>
						<button type="button" class="btn btn-primary rounded-round legitRipple">Apply Signature</button>
						<button type="button" class="btn btn-danger rounded-round legitRipple" data-toggle="modal" 
						data-target="#modal_default" >Add Comment</button>
					</div>
				</div>
				<div class="card" style="margin-top: 8px;background: #63af81">
					<div class="card-body">
						<h4 class="font-weight-semibold" style="text-align: center;color: #f9f9f9;"> LEFT FRONT WHEEL POSITION</h4>
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
						<h4 class="font-weight-semibold" style="text-align: center;color: #f9f9f9;margin-top: 12px;"> RIGHT REAR WHEEL POSITION</h4>
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

<div id="modal_default" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Basic modal</h5>
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

<script type="text/javascript">
	$('[data-popup="lightbox1"]').fancybox({
		padding: 3
	});
</script>

@endsection
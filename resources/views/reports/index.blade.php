@extends('layouts.app')

@section('content')
<?php //echo "<pre>";print_r($report_detail);exit; 
?>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="row">
				<div class="col-md-12">
					<div class="media bg-primary">
						<div class="page-header-content">
							<p>
								<h2 class="text-white">WHEEL / TIRE INSTALLATION REPORT</h2>
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="datatable-scroll">
				<table class="table" id="main-datatable">
					<thead>
						<tr>
							<th class="d-none"><i></i>ID</th>
							<th class="text-center"><i></i>DATE</th>
							<th><i></i>UNIT NUMBER</th>
							<th><i></i>LOCATION</th>
							<th><i></i>TECHNICIAN</th>
							<th><i></i>TORQUE AMOUNT</th>
							<th><i></i>2ND SIGNATURE</th>
							<th class="text-center">COMMENT</th>
						</tr>
					</thead>
					<tbody>
						@if (count($report_detail) > 0)
						@foreach($report_detail as $detail)
						<tr>
							<td class="d-none">{{ $detail->id }}</td>
							<td width="200px" class="text-center"><a href="{{ url('report/view/'.$detail->id)}}" class="btn btn-success btn-sm legitRipple m-2">View</a><?php echo date("Y M d", strtotime($detail->created_at)); ?></td>
							<td class="text-center">{{ $detail->report_unit_num}}</td>
							<td class="text-center"><?php if (isset($detail->location_name)) {
														echo $detail->location_name;
													} ?></td>
							<td class="text-center">{{ $detail->name }}</td>
							<td class="text-center">{{ $detail->weight }}</td>
							<?php if ($detail->signature != 1) { ?>
								<td><span class="badge badge-danger">Pending</span></td>
							<?php } else { ?>
								<td>{{ $detail->first_name." ".$detail->last_name }}</td>
							<?php } ?>
							<td class="text-center">
								<?php if (!empty($detail->last_user_comments || $detail->comment)) { ?>
									<i class="icon-checkmark3 mr-3 icon-2x text-primary"></i>
								<?php } ?>
							</td>
						</tr>
						@endforeach
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript">
	$("#main-datatable").DataTable({
		autoWidth: false,
		order: [0, "desc"],
		columnDefs: [{
			orderable: false,
			width: 100,
			targets: [7]
		}],
		dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
		language: {
			search: '<span>Filter:</span> _INPUT_',
			searchPlaceholder: 'Type to filter...',
			lengthMenu: '<span>Show:</span> _MENU_',
			paginate: {
				'first': 'First',
				'last': 'Last',
				'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;',
				'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;'
			}
		}
	});
</script>



@endsection
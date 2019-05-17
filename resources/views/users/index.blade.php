@extends('layouts.app')

@section('content')
<?php //echo "<pre>";print_r($user_detail);exit; ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="row">
					<div class="col-md-12">
						<div style="list-style: none; background-color: #40a6ff" class="media">
							<div class="media-body" style="padding-left: 5px;">
								<p><h2 style="color: white;">WHEEL / TIRE USERS REPORT</h2></p>
							</div>
						</div>
					</div>
				</div>
				<div class="datatable-scroll">
					<table class="table" id="main-datatable-users">
					    <thead style="background-color: #ecedec57">
					      <th>ID</th>
					      <th>Email</th>
					      <th>Full Name</th>
					      <th>Date</th>
					      <th></th>
					    </thead>
					    <tbody>
					    	@if (count($user_detail) > 0)
				    		@foreach($user_detail as $detail)
					    	<tr>
					        	<td><span>{{$detail->id}}</span></td>
					        	<td><span>{{$detail->email}}</span></td>
					        	<td><span><?php echo $detail->name;?></span></td>
					        	<td>{{date("Y-M-d", strtotime($detail->created_at))}}</td>
					        	<td style="text-align: right;"><a href="{{url('edit_user') }}"><i style="color: #69aa46!important;" class="icon-pencil mr-3 icon-1x"></i></a><a href="{{url('') }} "><i style="color: red;" class="icon-bin mr-3 icon-1x"></i></a></td>
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

	$("#main-datatable-users").DataTable({
	autoWidth: false,
	columnDefs: [{ 
		orderable: false,
		//width: 100,
		targets: [ 4 ]
	}],
	dom: '<"datatable-header"fl><"datatable-scroll"t><"datatable-footer"ip>',
	language: {
		search: '<span>Filter:</span> _INPUT_',
		searchPlaceholder: 'Type to filter...',
		lengthMenu: '<span>Show:</span> _MENU_',
		paginate: { 'first': 'First', 'last': 'Last', 'next': $('html').attr('dir') == 'rtl' ? '&larr;' : '&rarr;', 'previous': $('html').attr('dir') == 'rtl' ? '&rarr;' : '&larr;' }
	}
});

</script>



@endsection
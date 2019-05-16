@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="row">
				<div class="col-md-12">
					<div style="list-style: none; background-color: #40a6ff" class="media">
						<div class="media-body" style="padding-left: 5px;">
							<p><h2 style="color: white;">Results for "Registered Accounts"</h2></p>
						</div>
					</div>
				</div>
			</div>
			<div class="datatable-scroll">
				<table class="table" id="main-datatable-users">
				    <thead style="background-color: #ecedec57">
				      <th>ID</th>
				      <th>Company Name</th>
				      <th>Type</th>
				      <th>Phone</th>
				      <th>Email</th>
				      <th></th>
				    </thead>
				    <tbody>
				    	@if(count($account_detail) > 0)
				    		@foreach($account_detail as $detail)
				    		<tr>
				        	<td><span></span></td>
				        	<td><span>{{ $detail->company_name }}</span></td>
				        	<td><span>{{ $detail->account_type}}</span></td>
				        	<td><span>{{ $detail->account_phone }}</span></td>
				        	<td>{{ $detail->account_email }}</td>	
				        	<td style="text-align: center;"><a href="{{url('account/edit/'.$detail->id) }}"><i style="color: #69aa46!important;" class="icon-pencil mr-3 icon-1x"></i></a><a href="{{ url('/accounts/destroy/'.$detail->id) }} "><i style="color: red;" class="icon-bin mr-3 icon-1x"></i></a></td>
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
		targets: [ 5 ]
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
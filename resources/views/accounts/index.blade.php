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
				    	<tr>
				        	<td><span>44467</span></td>
				        	<td><span>Suzuki</span></td>
				        	<td><span>Customer</span></td>
				        	<td><span>322-4001730</span></td>
				        	<td>zubair@gmail.com</td>	
				        	<td style="text-align: center;"><a href="{{url('') }} "><i style="color: rebeccapurple;" class="icon-bin2 mr-3 icon-1x"></i></a><a href="{{url('edit_account') }}"><i style="color: red;" class="icon-pencil mr-3 icon-1x"></i></a></td>
			      		</tr>
			      		<tr>
				        	<td><span>43535</span></td>
				        	<td><span>Suzuki dsfs</span></td>
				        	<td><span>vendor</span></td>
				        	<td><span>322-68486549</span></td>
				        	<td>sdfsf@gmail.com</td>
				        	<td style="text-align: center;"><a href="{{url('') }} "><i style="color: rebeccapurple;" class="icon-bin2 mr-3 icon-1x"></i></a><a href="{{url('edit_account') }}"><i style="color: red;" class="icon-pencil mr-3 icon-1x"></i></a></td>
			      		</tr>
			      		<tr>
				        	<td><span>43535</span></td>
				        	<td><span>DICKINSON FLEET SERVICES</span></td>
				        	<td><span>customer</span></td>
				        	<td><span>32332-34433</span></td>
				        	<td>sdfsf@gmail.com</td>
				        	<td style="text-align: center;"><a href="{{url('') }} "><i style="color: rebeccapurple;" class="icon-bin2 mr-3 icon-1x"></i></a><a href="{{url('edit_account') }}"><i style="color: red;" class="icon-pencil mr-3 icon-1x"></i></a></td>
			      		</tr> 
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
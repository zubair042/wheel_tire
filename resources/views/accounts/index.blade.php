@extends('layouts.app')
@section('content')
<?php //echo "<pre>";print_r($account_detail);exit; ?>

<style>
	.ls {
		list-style: none;
		background-color: #40a6ff;
	}
	.pl{
		padding-left: 5px;
	}
</style>

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="row">
				<div class="col-md-12">
					<div class="media ls">
						<div class="media-body pl">
							<p><h2 class="text-white" >Results for "Registered Accounts"</h2></p>
						</div>
					</div>
				</div>
			</div>
			<div class="datatable-scroll">
				<table class="table" id="main-datatable-users">
				    <thead>
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
				        	<td><span>{{ $detail->id }}</span></td>
				        	<td><span>{{ $detail->account_name }}</span></td>
				        	<td><span>{{ $detail->account_type}}</span></td>
				        	<td><span>{{ $detail->account_phone }}</span></td>
				        	<td>{{ $detail->account_email }}</td>	
									<td align="right"><a href="{{url('account/edit/'.$detail->id) }}">
									<i class="icon-pencil mr-3 icon-1x text-success"></i></a>
									<a onclick="del_account(<?php echo $detail->id; ?>)" href="javascript:;">
									<i class="icon-bin mr-3 icon-1x text-danger"></i></a></td>
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

function del_account(id){ 
	if (confirm('Are you sure you want to delete')) {
		$.ajax({
			type: "post",
			url: "{{ route('destroy-account') }}",
			data: {'id': id, "_token": "{{ csrf_token() }}"},
			success:function(data){
				alert('Account deleted successfully!');
				location.reload();
			}
		})
	}else{
		alert('Delete Cancel');
	}
}

</script>



@endsection
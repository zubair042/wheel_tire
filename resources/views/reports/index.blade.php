@extends('layouts.app')

@section('content')
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
              <th>&nbsp;</th>
              <th class="text-center">DATE</th>
              <th>UNIT NUMBER</th>
              <th>LOCATION</th>
              <th>TECHNICIAN</th>
              <th>TORQUE AMOUNT</th>
              <th>2ND SIGNATURE</th>
              <th class="text-center">COMMENT</th>
            </tr>
          </thead>
          
        </table>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script> 
<script type="text/javascript">
	/*$("#main-datatable").DataTable({
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
	});*/
	$(document).ready(function() {
		$('#main-datatable').DataTable( {
			"processing": true,
			"serverSide": true,
			"order": [0, "desc"],
			"ajax": "{{route('reports_view')}}"
		});
	});	

</script>
<style>
.m-2{
	margin: .325rem !important;
}
.btn-group-sm>.btn, .btn-sm{
	padding: .075rem .875rem !important;
}
.table td, .table th{
	padding: 0px !important;	
}
.table td, .table th{
	padding: 0px;	
}
.dataTable thead .sorting, .dataTable thead .sorting_asc, .dataTable thead .sorting_asc_disabled, .dataTable thead .sorting_desc, .dataTable thead .sorting_desc_disabled{
	padding-right: 2.5rem !important;	
}
.dataTables_filter input{
	padding-left: 10px !important;	
}
.datatable-scroll{
	padding: 10px !important;	
}
</style>
@endsection 

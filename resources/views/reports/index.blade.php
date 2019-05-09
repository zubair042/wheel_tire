@extends('layouts.app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="row">
				<div class="col-md-12">
					<div style="list-style: none; background-color: #40a6ff" class="media">
						<div class="media-body" style="padding-left: 5px;">
							<p><h2 style="color: white;">WHEEL / TIRE INSTALLATION REPORT</h2></p>
						</div>
					</div>
				</div>
			</div>
			<div class="row" style="margin-top: 40px; padding-left: 20px;">
				<div class="col-md-12">
					<p style="color: #4d52ff">Latest Reports</p>
				</div>
			</div>
			<div class="datatable-scroll">
				<table class="table" id="main-datatable">
				    <thead style="background-color: #ecedec57">
				      <tr>
				        <th style="text-align: center;"><i style="margin-right: 8px;"></i>DATE</th>
				        <th><i style="margin-right: 8px;"></i>UNIT NUMBER</th>
				        <th><i style="margin-right: 8px;"></i>LOCATION</th>
				        <th><i style="margin-right: 8px;"></i>TECHNITIAN</th>
				        <th><i style="margin-right: 8px;"></i>TORQUE AMOUNT</th>
				        <th><i style="margin-right: 8px;"></i>2ND SIGNATURE</th>
				        <th class="text-center">COMMENT</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr>
				        <td width="200px" style="text-align: center;"><a href="{{('#')}}" class="btn btn-success btn-sm legitRipple" style="margin-right: 10px; background-color: #4ec88a">View</a><i style="margin-right: 8px;"></i>09:05:2019</td>
				        <td><i style="margin-right: 8px;"></i>001</td>
				        <td><i style="margin-right: 8px;"></i>Lahore</td>
				        <td><i style="margin-right: 8px;"></i>Usama</td>
				        <td><i style="margin-right: 8px;"></i>100Rs</td>
				        <td><i style="margin-right: 8px;"></i>Zubair ETNH</td>
				        <td class="text-center"><i class="icon-checkmark3 mr-3 icon-2x" style="color: #526fff;"></i></td>
				      </tr>
				      	<tr>
				          <td width="200px" style="text-align: center;"><a href="{{('#')}}" class="btn btn-success btn-sm legitRipple" style="margin-right: 10px; background-color: #4ec88a">View</a><i style="margin-right: 8px;"></i>10:05:2019</td>
				        <td><i style="margin-right: 8px;"></i>002</td>
				        <td><i style="margin-right: 8px;"></i>Karachi</td>
				        <td><i style="margin-right: 8px;"></i>Don</td>
				        <td><i style="margin-right: 8px;"></i>1Rs</td>
				        <td><i style="margin-right: 8px;"></i>Zubair ETNH</td>
				        <td class="text-center"><i class="icon-checkmark3 mr-3 icon-2x" style="color: #526fff;"></i></td>
				      </tr>
				         	<tr>
				          <td width="200px" style="text-align: center;"><a href="{{('#')}}" class="btn btn-success btn-sm legitRipple" style="margin-right: 10px; background-color: #4ec88a">View</a><i style="margin-right: 8px;"></i>11:05:2019</td>
				        <td><i style="margin-right: 8px;"></i>002</td>
				        <td><i style="margin-right: 8px;"></i>Multan</td>
				        <td><i style="margin-right: 8px;"></i>Ahmad</td>
				        <td><i style="margin-right: 8px;"></i>2Rs</td>
				        <td><i style="margin-right: 8px;"></i>Zubair ETNH</td>
				        <td class="text-center"><i class="icon-checkmark3 mr-3 icon-2x" style="color: #526fff;"></i></td>
				      </tr>
				   <!--  	<?php //if (count($report_detail) > 0) {
				    		//foreach ($report_detail as $detail) { ?> -->
				    	
				      	
				        	<!-- 	<span><?php //echo date("Y M d (H:i:s)",strtotime(created_at)); ?></span></td>
				        	<td style="text-align: center;"><span><?php  //echo  //unit_number; ?></span></td>
				        	<td style="text-align: center;"><span></span></td>
				        	<td style="text-align: center;"><?php  //echo name; ?></td>
				        	<td style="text-align: center;"><?php // echo weight; ?> lbs</td>
				        	<td style="text-align: center;"></td> -->


				        	<!-- <td class="text-center">
				        		<?php //if (!empty($detail->comments)) { ?>
				        			<i class="icon-checkmark3 mr-3 icon-2x" style="color: #526fff;"></i>	
				        		
				        	</td>	 -->
				      	<!-- </tr>
				      	<?php  ?> -->
				    </tbody>
			  	</table>
			</div>
		</div>
	</div>
</div>

<script src="{{ asset('js/plugins/tables/datatables/datatables.min.js') }}"></script>
<script type="text/javascript">
	$("#main-datatable").DataTable({
		autoWidth: false,
		columnDefs: [{ 
			orderable: false,
			width: 100,
			targets: [ 6 ]
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

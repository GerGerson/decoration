@extends('layout')

@section('content')

<!-- BEGIN SILDER -->
{{$silder}}
<!-- END SILDER -->

<div class="page-content">
	<h2>報價單</h2>
	<!-- BEGIN SAMPLE TABLE PORTLET-->
	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption">
				<i class="fa fa-cogs"></i>詳情
			</div>
		</div>
		
		<div class="portlet-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>報價單名稱</th>
							<th>狀態</th>
							<th>最後更新日期</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($quotations as $quotation)
						<tr class="quotation_row" href="/quotation/{{$quotation->id}}" style="cursor:pointer">
							<td>{{$quotation->quotation_name}}</td>
							@if ($quotation->status == 0)
								<td><span class="label label-warning">審核中</span></td>
							@else
								<td><span class="label label-success">已審核</span></td>
							@endif
							<td>{{$quotation->last_updated}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script src="assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script>
	jQuery(document).ready(function($) {
		$(".quotation_row").click(function() {
            window.document.location = $(this).attr("href");
		});
	});
</script>
@stop
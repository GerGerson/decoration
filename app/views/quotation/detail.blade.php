@extends('layout')

@section('content')

<!-- BEGIN SILDER -->
{{$silder}}
<!-- END SILDER -->

<div class="page-content" style="text-align:center;">
	<!-- BEGIN PAGE CONTENT-->
	<div class="invoice col-xs-offset-2" style="margin-bottom:-35px">
		<div class="row invoice-logo">
			<div class="col-xs-10">
				<address style="text-align:center">
						<strong><h2>{{$company->company_name_cht}}</h2></strong><br/>
					    <strong>地址：</strong>{{$company->company_address_cht}}<br/>
						<strong>電話：</strong> {{$company->company_phone}} 
				</address>
			</div>
			
		</div>
	</div>
	<hr/>
	<div class="col-xs-offset-2" style="margin-top:-20px">
		<div class="row">
			<div class="col-xs-5">
			
				<h4>報價單詳情</h4>
				<ul class="list-unstyled">
					<li>
						{{$quotation->quotation_name}}
					</li>
				</ul>
			</div>
			<div class="col-xs-5 invoice-payment">
				<h4><strong>備註</strong></h4>
				<ul class="list-unstyled" style="font-size: 12px; text-align:left">
					@if ($quotation->remark_1 != "")
						<li>
							<strong>備註1 </strong> {{$quotation->remark_1}}
						</li>
					@endif
					@if ($quotation->remark_2 != "")
						<li>
							<strong>備註2 </strong> {{$quotation->remark_2}}
						</li>
					@endif
					@if ($quotation->remark_3 != "")
						<li>
							<strong>備註3 </strong> {{$quotation->remark_3}}
						</li>
					@endif
					@if ($quotation->remark_4 != "")
						<li>
							<strong>備註4 </strong> {{$quotation->remark_4}}
						</li>
					@endif
					@if ($quotation->remark_5 != "")
						<li>
							<strong>備註5 </strong> {{$quotation->remark_5}}
						</li>
					@endif
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-10">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="text-align:right;">#</th>
							<th style="text-align:left;">
								項目名稱
							</th>
							<th class="hidden-480" style="text-align:right;">
								價錢
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $total = 0; 
								$count = 0;?>
						@foreach ($items as $item)
							<?php $total += $item->item_price; 
									$count++;?>
							<tr>
								<td style="text-align:right;">{{$count}}</td>
								<td style="text-align:left;">{{$item->item_name}}</td>
								<td style="text-align:right;">$<?php echo number_format($item->item_price, 2);?></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5">
				<div class="well">
					<p>
					最後更新日期 : 
					<span class="muted">
						<?php echo date("Y年m月d日", strtotime($quotation->last_updated))?>
					</span>
				</p>
				</div>
			</div>
			<div class="col-xs-5 invoice-block" style="text-align:right">
				<table class="table table-striped table-hover">
					<tbody>
						<tr>
							<td><strong>小結:</strong> $<?php echo number_format($total, 2)?></td>
						</tr>
						<tr>
							<td><strong>折扣:</strong> 12.9%</td>
						</tr>
						<tr>
							<td><strong>總額:</strong> $<?php echo number_format(($total - round($total * 0.129)), 2)?></td>
						</tr>
					</tbody>
				</table>
				<br/>
				<a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();">列印 <i class="fa fa-print"></i></a>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT-->
</div>

<script src="/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function($) {
      $(".quotation_row").click(function() {
            window.document.location = $(this).attr("href");
      });
});
</script>
@stop
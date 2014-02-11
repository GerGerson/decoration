@extends('layout')

@section('content')

<!-- BEGIN SILDER -->
{{$silder}}
<!-- END SILDER -->

<div class="page-content" style="text-align:center">
	<!-- BEGIN PAGE CONTENT-->
	<div class="invoice col-xs-offset-3" >
		<div class="row invoice-logo">
			<div class="col-xs-8 invoice-logo-space">
				<img src="/assets/img/invoice/walmart.png" alt=""/>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-8">
				<address style="text-align:center">
						<strong><h2>{{$company->company_name_cht}}</h2></strong><br/>
					    <strong>地址：</strong>{{$company->company_address_cht}}<br/>
						<strong>電話：</strong> {{$company->company_phone}} 
						
				</address>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-xs-4">
				<h3>報價單詳情</h3>
				<ul class="list-unstyled">
					<li>
						xx區
					</li>
				</ul>
			</div>
			<div class="col-xs-4 invoice-payment">
				<h3>備註</h3>
				<ul class="list-unstyled" style="font-size: 18px">
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
			<div class="col-xs-8">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th style="text-align:center;">
								項目名稱
							</th>
							<th class="hidden-480" style="text-align:center;">
								價錢
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $total = 0; ?>
						@foreach ($items as $item)
							<?php $total += $item->item_price; ?>
							<tr>
								<td style="text-align:center;">{{$item->item_name}}</td>
								<td style="text-align:right;">${{$item->item_price}}.00</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<div class="well">
					<p>
					最後更新日期 : 
					<span class="muted">
						{{$quotation->last_updated}}
					</span>
				</p>
				</div>
			</div>
			<div class="col-xs-4 invoice-block">
				<ul class="list-unstyled amounts">
					<li>
						<strong>小結:</strong> ${{$total}}
					</li>
					<li>
						<strong>折扣:</strong> 12.9%
					</li>
					<li>
						<strong>總額:</strong> $<?php echo ($total * (1 - 0.129))?>
					</li>
				</ul>
				<br/>
				<a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();">列印 <i class="fa fa-print"></i></a>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT-->
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
@extends('layout')

@section('content')

<!-- BEGIN SILDER -->
{{$silder}}
<!-- END SILDER -->

<div class="page-content">
	<!-- BEGIN PAGE CONTENT-->
	<div class="invoice">
		<div class="row invoice-logo">
			<div class="col-xs-6 invoice-logo-space">
				<img src="/assets/img/invoice/walmart.png" alt=""/>
			</div>
			<div class="col-xs-6">
				<p>
					Last updated : 
					<span class="muted">
						{{$quotation->last_updated}}
					</span>
				</p>
			</div>
		</div>
		<hr/>
		<div class="row">
			<div class="col-xs-4">
				<h4>報價單詳情</h4>
				<ul class="list-unstyled">
					<li>
						
					</li>
				</ul>
			</div>
			<div class="col-xs-4">
				<h4>N/A</h4>
				<ul class="list-unstyled">
					<li>
						
					</li>
				</ul>
			</div>
			<div class="col-xs-4 invoice-payment">
				<h4>備註</h4>
				<ul class="list-unstyled">
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
			<div class="col-xs-12">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>
								項目名稱
							</th>
							<th class="hidden-480">
								價錢
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $total = 0; ?>
						@foreach ($items as $item)
							<?php $total += $item->item_price; ?>
							<tr>
								<td>{{$item->item_name}}</td>
								<td>${{$item->item_price}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-4">
				<div class="well">
					<address>
						<strong>{{$company->company_name_cht}}</strong><br/>
						{{$company->company_address_cht}}<br/>
						<abbr title="Phone">P:</abbr> {{$company->company_phone}} </address>
					<address>
						<strong>Name</strong><br/>
						<a href="mailto:#">{{$company->company_email}}</a>
					</address>
				</div>
			</div>
			<div class="col-xs-8 invoice-block">
				<ul class="list-unstyled amounts">
					<li>
						<strong>Total amount:</strong> ${{$total}}
					</li>
					<li>
						<strong>Discount:</strong> 12.9%
					</li>
					<li>
						<strong>Total amount with discount:</strong> $<?php echo ($total * (1 - 0.129))?>
					</li>
				</ul>
				<br/>
				<a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();">Print <i class="fa fa-print"></i></a>
				<a class="btn btn-lg green hidden-print">Save Quotation <i class="fa fa-check"></i></a>
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
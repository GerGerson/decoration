@extends('layout')

@section('content')

<!-- BEGIN SILDER -->
{{$silder}}
<!-- END SILDER -->

<div class="page-content" style="text-align:center;">
	<!-- BEGIN PAGE CONTENT-->
	<div class="invoice col-xs-offset-2" style="margin-bottom:-35px">
		<div class="row">
			<div class="col-xs-10">
				<p style="text-align:right">報價單編號 ： <?=sprintf("%06d", $quotation->id);?></p>
			</div>
		</div>
		<div class="row invoice-logo">
			<div class="col-xs-10">
				<address style="text-align:center">
						<h2>{{$company->company_name_cht}}</h2><br/>
					    地址：{{$company->company_address_cht}}<br/>
						電話： {{$company->company_phone}} 
				</address>
			</div>
			
		</div>
	</div>
	<hr/>
	<div class="col-xs-offset-2" style="margin-top:-20px ">
		<div class="row">
			<div class="col-xs-5" style="font-size:15px">
				<table align="center">
					<tr>
						<td>報價單名稱 : &nbsp;&nbsp;</td>
						<td>{{$quotation->quotation_name}}</td>
					</tr>
					<tr>
						<td>報價單狀態 : &nbsp;&nbsp;</td>
						@if ($quotation->status == 0)
							<td>審核中</td>
						@else
							<td>已審核</td>
						@endif
					</tr>
				</table>

			</div>
			
			<div class="col-xs-5" style="font-size:15px">
				<table align="center">
					<tr>
						<td>客戶 : &nbsp;&nbsp;</td>
						<td>{{$quotation->give_to}}</td>
					</tr>
					<tr>
						<td>跟進師傅 : &nbsp;&nbsp; </td>
						<td>{{$quotation->contact_to}}</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-10">
				<table class="table table-striped table-hover" >
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
					<tbody >
						<?php $total = 0; 
								$count = 0;?>
						@foreach ($items as $item)
							<?php $total += $item->item_price; 
									$count++;?>
							<tr>
								<td style="text-align:right; padding-top: 4px; padding-bottom: 4px;" >{{$count}}</td>
								<td style="text-align:left; padding-top: 4px; padding-bottom: 4px;">{{$item->item_name}}</td>
								<td style="text-align:right; padding-top: 4px; padding-bottom: 4px;"><?php echo number_format($item->item_price, 2);?></td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-10 invoice-payment">
				<ul class="list-unstyled" style="font-size: 14px; text-align:left">
					@if ($quotation->remark_1 != "")
						<li>
							備註1 : {{$quotation->remark_1}}
						</li>
					@endif
					@if ($quotation->remark_2 != "")
						<li>
							備註2 : {{$quotation->remark_2}}
						</li>
					@endif
					@if ($quotation->remark_3 != "")
						<li>
							備註3 : {{$quotation->remark_3}}
						</li>
					@endif
					@if ($quotation->remark_4 != "")
						<li>
							備註4 : {{$quotation->remark_4}}
						</li>
					@endif
					@if ($quotation->remark_5 != "")
						<li>
							備註5 : {{$quotation->remark_5}}
						</li>
					@endif
				</ul>
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
							<td>小結: $<?php echo number_format($total, 2)?></td>
						</tr>
						<tr>
							<td>折扣: 12.9%</td>
						</tr>
						<tr>
							<td>總額: $<?php echo number_format(($total - round($total * 0.129)), 2)?></td>
						</tr>
					</tbody>
				</table>
				<br/>
				
			</div>
		</div>
		<div class="row">
			<div class="col-xs-5">
				<p>
					公司簽署
					<br/>
					<br/>
					<br/>
					<br/>
					_______________________________________
				</p>
				
			</div>
			<div class="col-xs-5">
				<p>
					客戶簽署
					<br/>
					<br/>
					<br/>
					<br/>
					_______________________________________
				</p>
			</div>
			<br/>
		</div>
		<div class="row">
			<div class="col-xs-5">
			</div>
			<div class="col-xs-5" style="text-align: right;">
				<a class="btn btn-lg blue hidden-print" onclick="javascript:window.print();">列印 <i class="fa fa-print"></i></a>
			</div>
			</br>
		</div>
	</div>
	<!-- END PAGE CONTENT-->
</div>

@stop
@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')
<div class="nk-content ">
	
	<div class="nk-block nk-block-lg">
		<div class="nk-block-head">
			<div class="nk-block-head-content">
				<h4 class="nk-block-title">Invoice</h4>
				<div class="nk-block-des">
					<!-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> -->
					<p class="text-right"><a href="{!! route('sales.create') !!}" class="btn btn-info">New Invoice</a></p>
				</div>
			</div>
		</div>
		<div class="card card-preview">
			<div class="card-inner">
<?php
use Carbon\Carbon;

function my($string) {
	$rt = Carbon::createFromFormat('Y-m-d', $string);
	return date('d F Y', mktime(0, 0, 0, $rt->month, $rt->day, $rt->year));
}
?>
				<table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
					<thead>
						<tr class="nk-tb-item nk-tb-head">
							
							@if(auth()->user()->id_group == 1)
							<th class="nk-tb-col"><span class="sub-text">Officer</span></th>
							@endif
							
							<th class="nk-tb-col tb-col-mb"><span class="sub-text">invoice nummber</span></th>
							<th class="nk-tb-col tb-col-md"><span class="sub-text">date</span></th>
							<th class="nk-tb-col tb-col-lg"><span class="sub-text">no tracking</span></th>
							<th class="nk-tb-col tb-col-lg"><span class="sub-text">total commission</span></th>
							<th class="nk-tb-col tb-col-lg"><span class="sub-text">total invoice</span></th>
							<th class="nk-tb-col tb-col-lg"><span class="sub-text">total payment</span></th>
							<th class="nk-tb-col tb-col-md"><span class="sub-text">Status</span></th>
							<th class="nk-tb-col nk-tb-col-tools text-right">
							</th>
						</tr>
					</thead>
					<tbody>
					<?php
						if (auth()->user()->id_group == 1) {
							$inv = App\Sale::where(['deleted_at' => NULL])->get();
						} else {
							$inv = App\Sale::where(['deleted_at' => NULL, 'id_user' => auth()->user()->id])->get();
						}
						
						?>
						@foreach($inv as $in)

						<tr class="nk-tb-item">
							@if(auth()->user()->id_group == 1)
							<td class="nk-tb-col">
								<div class="user-card">
									<div class="user-avatar bg-dim-primary d-none d-sm-flex">
										<span>{{strtoupper(substr(App\User::find($in->id_user)->name, 0, 1))}}</span>
									</div>
									<div class="user-info">
										<span class="tb-lead">{!! App\User::find($in->id_user)->name !!} <span class="dot dot-success d-md-none ml-1"></span></span>
										<span>info@softnio.com</span>
									</div>
								</div>
							</td>
							@endif
							<td class="nk-tb-col tb-col-mb" data-order="35040.34">
								<span class="tb-amount">{!! $in->id !!}</span>
							</td>
							<td class="nk-tb-col tb-col-md">
								<span>{!! my($in->date_sale) !!}</span>
							</td>
							<td class="nk-tb-col tb-col-md">
								<span><?php
									$slip = App\SlipNumbers::where(['id_sales' => $in->id])->get();
									foreach ( $slip as $imu ) {
										echo $imu->tracking_number.'<br />';
									}
								?></span>
							</td>
							
							<td class="nk-tb-col tb-col-lg">
								<span>RM {!! number_format($tcomm,2) !!}</span>
							</td>
							<td class="nk-tb-col tb-col-lg">
								<span>RM {!! number_format($tamo, 2) !!}</span>
							</td>
							<td class="nk-tb-col tb-col-lg">
								<span>RM {!! number_format($paya,2) !!}</span>
							</td>
							<td class="nk-tb-col tb-col-md">
								<span class="tb-statu <?php echo ($re < 0)? 'text-danger' : 'text-success' ?>"><?php echo ($re < 0) ? '<i class="fa fa-credit-card fa-lg" aria-hidden="true"></i>' : '<i class="fa fa-money fa-lg" aria-hidden="true"></i>' ?></span>
							</td>
							<td class="nk-tb-col nk-tb-col-tools">
								<ul class="nk-tb-actions gx-1">
									<li class="nk-tb-action-hidden">
										<a href="{!! route('printpdf.print', $in->id) !!}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Print PDF">
											<em class="icon ni ni-file-pdf"></em>
										</a>
									</li>
									<li class="nk-tb-action-hidden">
										<a href="{!! route('emailpdf.send', $in->id) !!}" class="btn btn-trigger btn-icon" data-toggle="tooltip" data-placement="top" title="Send Email">
											<em class="icon ni ni-mail-fill"></em>
										</a>
									</li>
									<li>
										<div class="drodown">
											<a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
											<div class="dropdown-menu dropdown-menu-right">
												<ul class="link-list-opt no-bdr">
													<li><a href="{!! route('sales.edit', $in->id) !!}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
													<li><a href="{!! route('sales.destroy', $in->id) !!}" data-id="{!! $in->id !!}" data-token="{{ csrf_token() }}" id="delete_product_<?=$in->id ?>" ><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
													<li class="divider"></li>
													<li><a href="{!! route('printpdf.print', $in->id) !!}" target="_blank"><em class="icon ni ni-file-pdf"></em><span>Print PDF</span></a></li>
													<li><a href="{!! route('emailpdf.send', $in->id) !!}" ><em class="icon ni ni-mail"></em><span>Send Email</span></a></li>
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</td>
						</tr><!-- .nk-tb-item  -->
						@endforeach
					</tbody>
				</table>
			</div>
		</div><!-- .card-preview -->
	</div> <!-- nk-block -->
</div>


@endsection



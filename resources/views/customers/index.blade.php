@extends('layout.master')

@section('content')

	<div class="nk-content ">
		<div class="container-fluid">
			<div class="nk-content-inner">
				<div class="nk-block-des">
					@if (session('error'))
						<div class="alert alert-danger" role="alert">
							{{ session('error') }}
						</div>
					@endif
					@if (session('success'))
						<div class="alert alert-success" role="alert" style="margin-top:30px;">
							{{ session('success') }}
						</div>
					@endif
				</div>

				<div class="nk-content-body">
					<div class="nk-block-head nk-block-head-sm">
						<div class="nk-block-between g-3">

							<div class="nk-block-head-content">
								<h3 class="nk-block-title page-title" style="text-align:center;">Customer List</h3>
								<div class="nk-block-des text-soft">
									@if(session('message'))
										<p>
											{{ session('message') }}
										</p>
									@endif
								</div>
							</div><!-- .nk-block-head-content -->

							<div class="nk-block-head-content">
							</div><!-- .nk-block-head-content -->

						</div><!-- .nk-block-between -->

						<div>
							<div class="" style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewCustomer">New Customer</button></div>
						</div>

					</div><!-- .nk-block-head -->
					<div class="nk-block">
						<div class="card card-bordered card-stretch">
							<div class="card-inner-group">
								<div class="card-inner">
									<div class="card-inner p-0">
										<table class="datatable-init nk-tb-list nk-tb-ulist" data-auto-responsive="false">
											<thead>
											<tr class="nk-tb-item nk-tb-head">
												<th class="nk-tb-col tb-col-mb">
													<span class="sub-text">
														<span>customer</span>
													</span>
												</th>
												<th class="nk-tb-col tb-col-md">
													<span class="sub-text">
														<span>address</span>
													</span>
												</th>
												<th class="nk-tb-col tb-col-md">
													<span class="sub-text">
														<span>postcode</span>
													</span>
												</th>

												<th class="nk-tb-col tb-col-md">
													<span class="sub-text">
														<span>Telephone</span>
													</span>
												</th>

												<th class="nk-tb-col tb-col-md">
													<span class="sub-text">
														<span>email</span>
													</span>
												</th>

												<th class="nk-tb-col nk-tb-col-tools text-right">
												</th>
											</tr>
											</thead>
											<tbody>
											<?php
											if (auth()->user()->id_group == 1) {
												$inv = App\Customers::get();
											} else {
												$inv = App\Customers::where(['id_user' => auth()->user()->id])->get();
											}
											?>
											@foreach($inv as $in)
												@csrf
												<tr class="nk-tb-item">
													<td class="nk-tb-col nk-tb-col-mb">
														<div class="user-card">
															<div class="user-avatar bg-dim-primary d-none d-sm-flex">
																<span>{{strtoupper(substr($in->client, 0, 1))}}</span>
															</div>
															<a class="user-info" href="#">
																<span class="tb-lead">{{$in->client}}<span class="dot dot-success d-md-none ml-1"></span></span>
															</a>
														</div>
													</td>

													<td class="nk-tb-col tb-col-md">
														<div class = "">
															<a href="#" ><span style = "color:#364a63">{{ $in->client_address }}</span></a>
														</div>
													</td>

													<td class="nk-tb-col tb-col-md">
														<div class = "">
															<a href="#" ><span style = "color:#364a63">{{ $in->client_poskod }}</span></a>
														</div>
													</td>

													<td class="nk-tb-col tb-col-md">
														<div class = "">
															<a href="#" ><span style = "color:#364a63">{{ $in->client_telephone }}</span></a>
														</div>
													</td>

													<td class="nk-tb-col tb-col-md">
														<div class = "">
															<a href="#" ><span style = "color:#364a63">{{ $in->client_email }}</span></a>
														</div>
													</td>

													<td class="nk-tb-col nk-tb-col-tools">
														<div class="">
															<a href="{!! route('customers.edit', $in->id) !!}" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
															<a href="{!! route('customers.destroy', $in->id) !!}" data-id="{!! $in->id !!}" id="delete_product_<?=$in->id ?>" title="Delete" class="delete_button"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
														</div>
													</td>
												</tr>
												@endforeach
												</form>
											</tbody>
										</table>
									</div><!-- .card-inner -->
								</div>
							</div><!-- .card-inner-group -->
						</div><!-- .card -->
					</div><!-- .nk-block -->
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" tabindex="-1" id="modalNewCustomer">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<a href="#" class="close" data-dismiss="modal" aria-label="Close">
					<em class="icon ni ni-cross"></em>
				</a>
				<div class="modal-header">
					<h5 class="modal-title">Create New Customer</h5>

				</div>
				<div class="modal-body">
					<p>

					</p>
					{!! Form::open(['route' => 'customers.store', 'class' => 'form-horizontal', 'id' => 'form']) !!}
					<input type="text" name="type" value="new" hidden="">
					<div class="form-group">
						<label class="form-label" for="default-01">Client Name:</label>
						<div class="form-control-wrap">
							<input type="text" name="client" class="form-control" id="client" placeholder="Enter the Name" required>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="default-01">Client Address:</label>
						<div class="form-control-wrap">
							<input type="text" name="client_address" class="form-control" id="client_address" placeholder="Enter the Address" required>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="default-01">Post Code:</label>
						<div class="form-control-wrap">
							<input type="text" name="client_poskod" class="form-control" id="client_postcode" placeholder="Enter the Postcode" required>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="default-01">Phone Number:</label>
						<div class="form-control-wrap">
							<input type="text" name="client_telephone" class="form-control" id="telephone" placeholder="Enter the Phone" required>
						</div>
					</div>
					<div class="form-group">
						<label class="form-label" for="default-01">Email Address:</label>
						<div class="form-control-wrap">
							<input type="text" name="client_email" class="form-control" id="client_email" placeholder="Enter the Email" required>
						</div>
					</div>
					<div class="form-group" style="text-align: right;">
						{!! Form::submit('Create', ['class' => 'btn btn-lg btn-primary']) !!}
					</div>
				</div>
				{!! Form::close() !!}</div>
		</div>
		<div class="modal-footer bg-light">
			<span class="sub-text"></span>
		</div>
	</div>
	</div>
	</div>

@endsection
@section('jquery')
	/////////////////////////////////////////////////////////////////////////////////////////
	// ajax post delete row
	// readProducts(); /* it will load products when document loads */

	$(document).on('click', '.delete_button', function(e){
	var productId = $(this).data('id');
	SwalDelete(productId);
	e.preventDefault();
	});

	// function readProducts(){
	// 	$('#load-products').load('read.php');
	// }

	function SwalDelete(productId){
	swal.fire({
	title: 'Are you sure?',
	text: "It will be deleted permanently!",
	type: 'warning',
	showCancelButton: true,
	confirmButtonColor: '#3085d6',
	cancelButtonColor: '#d33',
	confirmButtonText: 'Yes, delete it!',
	showLoaderOnConfirm: true,
	allowOutsideClick: false,

	preConfirm: function(){
	return new Promise(function(resolve) {
	$.ajax({
	headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	<?php if(count($inv) == 0){$idddd = "";}else{$idddd = $in->id;}?>
	url: '<?=route('customers.destroy', $idddd)?>',
	type: 'delete',
	data:	{
	id: productId,
	_token : $('meta[name=csrf-token]').attr('content')
	},
	dataType: 'json'
	})
	.done(function(response){
	swal.fire('Deleted!', response.message, response.status);
	// readProducts();
	// $('#delete_product_' + productId).text('imhere').css({"color": "red"});
	$('#delete_product_' + productId).parent().parent().remove();
	})
	.fail(function(){
	swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
	});
	console.log()
	});
	},
	});
	}

	/////////////////////////////////////////////////////////////////////////////////////////
@endsection
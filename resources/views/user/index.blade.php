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
							<h3 class="nk-block-title page-title">Users List</h3>
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
						<div class="" style="text-align: right;"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewUser">New User</button></div>
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
												
												<th class="nk-tb-col nk-tb-col-check">
													<span class="sub-text">
														<span>No</span>
													</span>
												</th>

												<th class="nk-tb-col tb-col-mb">
													<span class="sub-text">
														<span>name</span>
													</span>
												</th>
												<th class="nk-tb-col tb-col-md">
													<span class="sub-text">
														<span>username</span>
													</span>
												</th>
												<th class="nk-tb-col tb-col-md">
													<span class="sub-text">
														<span>email</span>
													</span>
												</th>
												
												<th class="nk-tb-col tb-col-md">
													<span class="sub-text">
														<span>group</span>
													</span>
												</th>
												
												<th class="nk-tb-col nk-tb-col-tools text-right">
												</th>
											</tr>
										</thead>
										<tbody>
											@foreach($us as $k)
												@csrf
											<tr class="nk-tb-item">
												<td class="nk-tb-col tb-col-mb">
													<span class="tb-amount">{{11}}</span>
												</td>
												<td class="nk-tb-col nk-tb-col-mb">
													<div class="user-card">
														<div class="user-avatar bg-dim-primary d-none d-sm-flex">
															<span>{{strtoupper(substr($k->name, 0, 1))}}</span>
														</div>
														 
															<span class="tb-lead">{{$k->name}}<span class="dot dot-success d-md-none ml-1"></span></span>
														 
													</div>
												</td>

												<td class="nk-tb-col tb-col-md">
													<div class = "">
													 <span style = "color:#364a63">{{ $k->username }}</span> 
													</div>
												</td>
												
												<td class="nk-tb-col tb-col-md">
													<div class = "">
													 <span style = "color:#364a63">{{ $k->email }}</span> 
													</div>
												</td>
												<?php
													// refer to users model
													$use = \App\UserGroup::findOrFail($k->id_group);
													?>
												<td class="nk-tb-col tb-col-md">
													<div class = "">    
														 <span style = "color:#364a63">{{ $use->group }}</span> 
													</div>
												</td>

												<td class="nk-tb-col nk-tb-col-tools">
													<div class="">
															<a href="{!! route('user.edit', $k->slug) !!}" ><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i></a>
															@if($k->id != 1)
															<a href="{!! route('user.destroy', $k->slug) !!}" data-id="{!! $k->slug !!}" id="delete_product_<?=$k->slug ?>" title="Delete" class="delete_button"><i class="fa fa-trash fa-lg" aria-hidden="true"></i></a>
															@endif
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

<div class="modal fade" tabindex="-1" id="modalNewUser">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<a href="#" class="close" data-dismiss="modal" aria-label="Close">
				<em class="icon ni ni-cross"></em>
			</a>
			<div class="modal-header">
				<h5 class="modal-title">Create New User</h5>
			</div>
			<div class="modal-body">
				<p>
					
				</p>
				{!! Form::open(['route' => 'user.store', 'class' => 'form-horizontal', 'id' => 'form']) !!}
						<div class="row">
							<div class="col-4">
								<div class="form-group">
									<label class="form-label" for="default-01">Name</label>
									<div class="form-control-wrap">
										<input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">Username</label>
									<div class="form-control-wrap">
										<input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">E-mail</label>
									<div class="form-control-wrap">
										<input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">Password</label>
									<div class="form-control-wrap">
										<input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">Confirm Password</label>
									<div class="form-control-wrap">
										<input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Enter Password Confirmation" required>
									</div>
								</div>
								<?php
									foreach ($gr as $key) {
										$lm[$key->id] = $key->group;
									}
								?>
								<div class="form-group">
									<label class="form-label" for="default-01">User Group :</label>
									<div class="form-control-wrap">
										{!! Form::select('id_group', $lm, NULL,['class' => 'form-control', 'id' => 'ug', 'placeholder' => 'Choose User Group']) !!}
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">Choose Your Color :</label>
									<div class="form-control-wrap">
										<input type="text" name="color" class="form-control" id="color" placeholder="Enter Color" required>
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group">
									<label class="form-label" for="default-01">Business Name</label>
									<div class="form-control-wrap">
										<input type="text" name="name" class="form-control" id="name" placeholder="Enter name" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">BUsiness Address</label>
									<div class="form-control-wrap">
										<input type="text" name="address" class="form-control" id="username" placeholder="Enter address" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">Business Address 2nd Line</label>
									<div class="form-control-wrap">
										<input type="text" name="line" class="form-control" id="email" placeholder="Enter email" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">City</label>
									<div class="form-control-wrap">
										<input type="text" name="city" class="form-control" id="password" placeholder="Enter city" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">County</label>
									<div class="form-control-wrap">
										<input type="text" name="county" class="form-control" id="password_confirmation" placeholder="Enter county" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">Post Code</label>
									<div class="form-control-wrap">
										<input type="text" name="code" class="form-control" id="password_confirmation" placeholder="Enter code" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">Business Phone Number</label>
									<div class="form-control-wrap">
										<input type="text" name="phone" class="form-control" id="color" placeholder="Enter phone" required>
									</div>
								</div>
								
							</div>
							<div class="col-4">
								<div class="form-group">
									<label class="form-label" for="default-01">Business Email address</label>
									<div class="form-control-wrap">
										<input type="email" name="bemail" class="form-control" id="color" placeholder="Enter Business email" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">VAT Number</label>
									<div class="form-control-wrap">
										<input type="text" name="vat" class="form-control" id="color" placeholder="Enter VAT" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">Business Owner/Manager Name</label>
									<div class="form-control-wrap">
										<input type="text" name="manager" class="form-control" id="color" placeholder="Enter owner" required>
									</div>
								</div>
								<div class="form-group">
									<label class="form-label" for="default-01">Business Owner Contact Number</label>
									<div class="form-control-wrap">
										<input type="text" name="contact" class="form-control" id="color" placeholder="Enter VAT" required>
									</div>
								</div>
							</div>
							
						</div>
						<div class="form-group mt-3" style="text-align: right;">
							{!! Form::submit('Save', ['class' => 'btn btn-lg btn-primary']) !!}
						</div>
					</div>
					
					{!! Form::close() !!}</div>
				</div>
			<!-- <div class="modal-footer bg-light">
				<span class="sub-text"></span>
			</div> -->
		</div>
	</div>
</div>




@endsection


@section('jquery')
	$("input").keyup(function() {
		toUpper(this);
	});
@endsection
@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')
	

	<div class="nk-content ">
		<div class="container-fluid" style="margin-top: 100px;">
			<div class="nk-content-inner">
				<div class="nk-content-body">
					<div class="components-preview wide-md mx-auto">
						<div class="nk-block-head nk-block-head-lg wide-sm">
							<div class="nk-block-head-content">
								<h2 class="nk-block-title fw-normal">New Invoice</h2>
								<div class="nk-block-des">
									<p class="lead"></p>
								</div>
							</div>
						</div><!-- .nk-block-head -->
						<div class="nk-block nk-block-lg">
							<div class="card card-preview">
								<div class="card-inner">
									<div class="preview-block">
										<span class="preview-title-lg overline-title">Default Preview</span>

										{!! Form::open(['route' => 'sales.store', 'class' => 'form-horizontal', 'id' => 'form']) !!}

										<div class="row gy-4">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Invoice Number:</label>
													<input type="text" name="invoice_num" class="form-control" id="default-1-02" value="012">
												</div>
											</div>
										</div>

										<div class="row gy-4">
											<div class="col-sm-6">
												<div class="form-group">
													<label class="form-label" for="default-01">Select Existing Customer :</label>
													<div class="form-control-wrap">
														<select name="repeatcust" id="custsel" class="form-select form-control form-control-lg">
															<!-- <option value="" data-client="" data-client_address="" data-client_poskod="" data-client_email="" data-client_phone="" >Choose Customer</option> -->
															<?php $rc = \App\Customers::all() ?>
															@if( $rc->count() > 0 )
															@foreach( $rc as $ec ) :
																<option value="{!! $ec->id !!}" data-client="{!! $ec->client !!}" data-client_address="{!! $ec->client_address !!}" data-client_poskod="{!! $ec->client_poskod !!}" data-client_email="{!! $ec->client_email !!}" data-client_phone="{!! $ec->client_phone !!}" >{!! $ec->client !!}</option>
															@endforeach
															@endif
														</select>
													</div>
												</div>
											</div>

											<div class="col-sm-6">
												<div class="form-group">
													<label class="form-label" for="default-textarea">Invoice Apis</label>
													<div class="form-control-wrap">
														<textarea class="form-control form-control-simple no-resize" id="default-textarea">Invoice Apis,Invoice Apis,Invoice Apis,Invoice Apis,</textarea>
													</div>
												</div>
											</div>
										</div>

										<hr class="preview-hr">

										<span class="preview-title-lg overline-title">Contents</span>

										<div class="row gy-4 add-des-1" style="display:none;">
											<div class="col-sm-8">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Description</label>
													<input type="text" name="description_1" class="form-control" id="default-1-02" value="Audi Q7 TDI Sport as Described Above">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Quantity</label>
													<input type="text" name="quantity_1" class="form-control" id="default-1-02" value="1">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Amount</label>
													<input type="text" name="amount_1" class="form-control" id="default-1-02" value="$1500.00">
												</div>
											</div>
											<div class="custom-control float-right">
												<button type = "button" class="remove_attach btn btn-danger">Remove</button>
											</div>
										</div>

										<div class="row gy-4 add-des-2" style="display:none;">
											<div class="col-sm-8">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Description</label>
													<input type="text" name="description_2" class="form-control" id="default-1-02" value="Audi Q7 TDI Sport as Described Above">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Quantity</label>
													<input type="text" name="quantity_2" class="form-control" id="default-1-02" value="1">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Amount</label>
													<input type="text" name="amount_2" class="form-control" id="default-1-02" value="$1500.00">
												</div>
											</div>
											<div class="custom-control float-right">
												<button type = "button" class="remove_attach btn btn-danger">Remove</button>
											</div>
										</div>

										<div class="row gy-4 add-des-3" style="display:none;">
											<div class="col-sm-8">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Description</label>
													<input type="text" name="description_3" class="form-control" id="default-1-02" value="Audi Q7 TDI Sport as Described Above">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Quantity</label>
													<input type="text" name="quantity_3" class="form-control" id="default-1-02" value="1">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Amount</label>
													<input type="text" name="amount_3" class="form-control" id="default-1-02" value="$1500.00">
												</div>
											</div>
											<div class="custom-control float-right">
												<button type = "button" class="remove_attach btn btn-danger">Remove</button>
											</div>
										</div>

										<div class="row gy-4 add-des-4" style="display:none;">
											<div class="col-sm-8">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Description</label>
													<input type="text" name="description_4" class="form-control" id="default-1-02" value="Audi Q7 TDI Sport as Described Above">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Quantity</label>
													<input type="text" name="quantity_4" class="form-control" id="default-1-02" value="1">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Amount</label>
													<input type="text" name="amount_4" class="form-control" id="default-1-02" value="$1500.00">
												</div>
											</div>
											<div class="custom-control float-right">
												<button type = "button" class="remove_attach btn btn-danger">Remove</button>
											</div>
										</div>

										<div class="row gy-4 add-des-5" style="display:none;">
											<div class="col-sm-8">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Description</label>
													<input type="text" name="description_5" class="form-control" id="default-1-02" value="Audi Q7 TDI Sport as Described Above">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Quantity</label>
													<input type="text" name="quantity_5" class="form-control" id="default-1-02" value="1">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Amount</label>
													<input type="text" name="amount_5" class="form-control" id="default-1-02" value="$1500.00">
												</div>
											</div>
											<div class="custom-control float-right">
												<button type = "button" class="remove_attach btn btn-danger">Remove</button>
											</div>
										</div>

										<div class="row gy-4 add-des-6" style="display:none;">
											<div class="col-sm-8">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Description</label>
													<input type="text" name="description_6" class="form-control" id="default-1-02" value="Audi Q7 TDI Sport as Described Above">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Quantity</label>
													<input type="text" name="quantity_6" class="form-control" id="default-1-02" value="1">
												</div>
											</div>
											<div class="col-sm-2">
												<div class="form-group">
													<label class="form-label" for="default-1-02">Amount</label>
													<input type="text" name="amount_6" class="form-control" id="default-1-02" value="$1500.00">
												</div>
											</div>
											<div class="custom-control float-right">
												<button type = "button" class="remove_attach btn btn-danger">Remove</button>
											</div>
										</div>

										<div class="form-group" style="padding-top: 10px;">
											<button type = "button" class="add_attach btn btn-primary">Add Description +</button>
										</div>

										<hr class="contents-hr"><br/>

										<span class="preview-title-lg overline-title">Vehicle Data</span>

										<br/>
										
										<lable class="form-label" id="regNum">Registration Number :</label>
										<input tyle="text" class="form-control col-sm-6" placeholder="Input the registration number" id="registerNumber" name="registrationNum"/><br/>

										<button class="btn btn-lg btn-primary" id="getData">Get Data</button>
										
										
										<br/>


										<br/>
										<div class="row" id="vehicleDataDisplay" style="display: none;">
											<div class="col-md-4">
												<label class="form-label">Make :</label>
												<input type="text" class="form-control" name="make" disabled/>
												<label class="form-label">Model :</label>
												<input type="text" class="form-control" name="model" disabled/>
												<label class="form-label">Year :</label>
												<input type="text" class="form-control" name="year" disabled/>
												<label class="form-label">Colour :</label>
												<input type="text" class="form-control" name="colour" disabled/>
												<label class="form-label">Gearbox :</label>
												<input type="text" class="form-control" name="gearbox" disabled/>
												<label class="form-label">Weight :</label>
												<input type="text" class="form-control" name="weight" disabled/>
												<label class="form-label">Engine Number :</label>
												<input type="text" class="form-control" name="engineNumber" disabled/>
												<label class="form-label">Model Setup Data :</label>
												<input type="text" class="form-control" name="modelSetupDate" disabled/>
												<label class="form-label">Body style :</label>
												<input type="text" class="form-control" name="bodyStyle" disabled/>
												<label class="form-label">Exported :</label>
												<input type="text" class="form-control" name="expoerted" disabled/>
												<label class="form-label">First Registered :</label>
												<input type="text" class="form-control" name="firstRegistered" disabled/>
												<label class="form-label">Scrapped :</label>
												<input type="text" class="form-control" name="scrapped" disabled/>
												<label class="form-label">Door plan :</label>
												<input type="text" class="form-control" name="doorPlan" disabled/>
												<label class="form-label">Model Variant :</label>
												<input type="text" class="form-control" name="modelVariant" disabled/>
											</div>
											<div class="col-md-4">
												<label class="form-label">Fuel :</label>
												<input type="text" class="form-control" name="fuel" disabled/>
												<label class="form-label">VRM :</label>
												<input type="text" class="form-control" name="vrm" disabled/>
												<label class="form-label">Keeper Change :</label>
												<input type="text" class="form-control" name="keeperChange" disabled/>
												<label class="form-label">CO2 Emissions :</label>
												<input type="text" class="form-control" name="co2Emissions" disabled/>
												<label class="form-label">Irish import :</label>
												<input type="text" class="form-control" name="irishImport" disabled/>
												<label class="form-label">Seating :</label>
												<input type="text" class="form-control" name="seating" disabled/>
												<label class="form-label">Keeper Count :</label>
												<input type="text" class="form-control" name="keeperCount" disabled/>
												<label class="form-label">V5 Certificate count :</label>
												<input type="text" class="form-control" name="certificateCount" disabled/>
												<label class="form-label">VIC Status :</label>
												<input type="text" class="form-control" name="vicStatus" disabled/>
												<label class="form-label">VED rate :</label>
												<input type="text" class="form-control" name="vedRate" disabled/>
												<label class="form-label">VED year 1 :</label>
												<input type="text" class="form-control" name="vedYear1" disabled/>
												<label class="form-label">Width :</label>
												<input type="text" class="form-control" name="width" disabled/>
												<label class="form-label">Length :</label>
												<input type="text" class="form-control" name="length" disabled/>
												<label class="form-label">Height :</label>
												<input type="text" class="form-control" name="height" disabled/>
											</div>
											<div class="col-md-4">
												<label class="form-label">Towing Weight :</label>
												<input type="text" class="form-control" name="towingWeight" disabled/>
												<label class="form-label">Wheelbase :</label>
												<input type="text" class="form-control" name="wheelbase" disabled/>
												<label class="form-label">Axels :</label>
												<input type="text" class="form-control" name="axels" disabled/>
												<label class="form-label">Plate change :</label>
												<input type="text" class="form-control" name="plateChange" disabled/>
												<label class="form-label">Valves :</label>
												<input type="text" class="form-control" name="valves" disabled/>
												<label class="form-label">Aspiration :</label>
												<input type="text" class="form-control" name="aspiration" disabled/>
												<label class="form-label">Cylinder type :</label>
												<input type="text" class="form-control" name="cylinderType" disabled/>
												<label class="form-label">Valve Gear :</label>
												<input type="text" class="form-control" name="valveGear" disabled/>
												<label class="form-label">Bore :</label>
												<input type="text" class="form-control" name="bore" disabled/>
												<label class="form-label">Stroke :</label>
												<input type="text" class="form-control" name="stroke" disabled/>
												<label class="form-label">EuroStatus :</label>
												<input type="text" class="form-control" name="euroStatus" disabled/>
												<label class="form-label">TypeApproval :</label>
												<input type="text" class="form-control" name="typeApproval" disabled/>
												<label class="form-label">MPG :</label>
												<input type="text" class="form-control" name="mpg" disabled/>
											</div>
										</div>

										<hr class="contents-hr"><br/>

										<span class="preview-title-lg overline-title">Other Setting</span><br/>
										<div class="row">
											<div class="col-md-6">
												<label class="form-label">Vehicle($) :</label>
												<input type="text" class="form-control" name="cost"/>
												<label class="form-label">Warranty :</label>
												<input type="text" class="form-control" name="warranty"/>
												<label class="form-label">Delivery Fee, Delivery Address as Above :</label>
												<input type="text" class="form-control" name="deliveryFee"/>
												<label class="form-label">Custom Field :</label>
												<input type="text" class="form-control" name="customField"/>
											</div>
											<div class="col-md-6">
												<label class="form-label">Discount :</label>
												<input type="text" class="form-control" name="discount"/>
												<label class="form-label">Part Exchange BMW 325 SE, Reg LE12RED, Red, 312500 Miles :</label>
												<input type="text" class="form-control" name="partExchange"/>
												<label class="form-label">Deposit Paid :</label>
												<input type="text" class="form-control" name="depositPaid"/>
												<label class="form-label">Finance Paid :</label>
												<input type="text" class="form-control" name="financePaid"/>
											</div>
										</div>
																
										<hr class="contents-hr">						
										<input type="hidden" id="desc_num" name="desc_num" value="0" >
										<div class="form-group" style="text-align: right;">
											{!! Form::submit('Create', ['class' => 'btn btn-lg btn-primary']) !!}
										</div>
									</div>
									{!! Form::close() !!}
								</div>
							</div><!-- .card-preview -->
						</div><!-- .nk-block -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
	<script>
		var _validFileExtensions = [".pdf",".docx",".jpg", ".jpeg", ".bmp", ".gif", ".png",".jfif" , ".pjpeg" , ".pjp"];
		var _filenum = 0;
		var isfiles = true;
		
		$(document).ready(function() {
			var attach_number = 0;
			var max_attach = 7;
			var wrapper         = $(".attach_list");

			$(".add_attach").click(function(e){
				e.preventDefault();
				if(attach_number < max_attach){
					attach_number++;
					$(".add-des-" + attach_number).css('display','flex');     
					$('#desc_num').val(attach_number);      
				} else {
					alert('You Reached the limits')
				}
			});    

			$("body").on("click",".remove_attach",function(){
				$(".add-des-" + attach_number).css('display','none');
				attach_number--;
				// var parent = this.parentNode;
				// $(this).parents(".file-item").remove();
			});
		});    

	</script>   

	<script>
	$(document).ready(function() {
		$("#getData").click(function(e) {
			e.preventDefault();
			var regNumber = $("#registerNumber").val();

			if(regNumber == '') {
				alert("Please input a Registration Number!");
			}else{
				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$.ajax({
					url: '/getVehicleData',
					type: 'POST',
					data: {
						'reguisNum' : regNumber
					},
					success: function(response) {
						if ($("#vehicleDataDisplay").is(":visible")) {
							$("#vehicleDataDisplay").hide();
						} else {
							$("#vehicleDataDisplay").show();
						}
					}
				});
			}
		});
	});

	</script>
@endsection
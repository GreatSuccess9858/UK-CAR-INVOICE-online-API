@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')


	<div class="row">
		<p>
			<a href="{!! route('customers.index') !!}" class="btn btn-info" style="margin-top:15px;">Back to customers list</a>
		</p>
	</div>

	{!! Form::model($customers, [ 'route' => 'customers.store', 'method' => 'POST', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}
	<input type="text" value="update" name="type" hidden>
	{!! Form::input('text', 'id', @$value, ['hidden']) !!}

	<div class="col-md-12" style="margin-top:80px;">
		<div class="panel panel-default">
			<div class="panel-heading" style="font-size:30px; text-align: center;">Edit Customer</div><br/><hr/><br/>
			<div class="panel-body" id="panel-body">
				<div class="row">
					<div class="col-lg-12">

						<div class="form-group {!! ( count($errors->get('client'))  > 0 )? 'has-error' : '' !!}">
							{!! Form::label('pel', 'Full Name :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'client', @$value, ['class' => 'form-control', 'placeholder' => 'Customer', 'id' => 'pel']) !!}
							</div>
						</div>
						
						<div class="form-group {!! ( count($errors->get('client_email')) ) >0 ? 'has-error' : '' !!}" id="client_email">
							{!! Form::label('tela', 'Email :', ['class' => 'col-sm-4 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'client_email', @$value, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'tela']) !!}
							</div>
						</div>

						<div class="row">
							<div class="form-group {!! ( count($errors->get('client_address')) ) >0 ? 'has-error' : '' !!} col-md-5" id="street_address">
								{!! Form::label('apel', 'Street Address :', ['class' => 'col-sm-6 control-label']) !!}
								<div class="col-sm-12">
									{!! Form::input('text', 'client_address', @$value, ['class' => 'form-control', 'placeholder' => 'Street Address', 'id' => 'apel']) !!}
								</div>
							</div>
							<div class="form-group {!! ( count($errors->get('address_line2')) ) >0 ? 'has-error' : '' !!} col-md-5" id="street_address">
								{!! Form::label('apel', 'Address line 2 :', ['class' => 'col-sm-6 control-label']) !!}
								<div class="col-sm-12">
									{!! Form::input('text', 'address_line2', @$value, ['class' => 'form-control', 'placeholder' => 'Address Line 2', 'id' => 'apel']) !!}
								</div>
							</div>	
						</div>
						
						<div class="row">
							<div class="form-group {!! ( count($errors->get('city')) ) >0 ? 'has-error' : '' !!} col-md-3">
								{!! Form::label('apel', 'City :', ['class' => 'col-sm-8 control-label']) !!}
								<div class="col-sm-12">
									{!! Form::input('text', 'city', @$value, ['class' => 'form-control', 'placeholder' => 'Customer Address', 'id' => 'apel']) !!}
								</div>
							</div>	
							<div class="form-group {!! ( count($errors->get('state_province')) ) >0 ? 'has-error' : '' !!} col-md-4">
								{!! Form::label('apel', 'State/Province :', ['class' => 'col-sm-8 control-label']) !!}
								<div class="col-sm-12">
									{!! Form::input('text', 'state_province', @$value, ['class' => 'form-control', 'placeholder' => 'Customer Address', 'id' => 'apel']) !!}
								</div>
							</div>	
							<div class="form-group {!! ( count($errors->get('client_poskod')) ) >0 ? 'has-error' : '' !!} col-md-3">
								{!! Form::label('pos', 'Postal/Zip Code :', ['class' => 'col-sm-8 control-label']) !!}
								<div class="col-sm-12">
									{!! Form::input('text', 'client_poskod', @$value, ['class' => 'form-control', 'placeholder' => 'Postcode', 'id' => 'pos']) !!}
								</div>
							</div>	
						</div>
						
						<div class="row">
								<div class="form-group {!! ( count($errors->get('client_phone')) ) >0 ? 'has-error' : '' !!} col-md-5">
									{!! Form::label('tel', 'Telephone :', ['class' => 'col-sm-4 control-label']) !!}
									<div class="col-sm-12">
										{!! Form::input('text', 'client_telephone', @$value, ['class' => 'form-control', 'placeholder' => 'Phone', 'id' => 'tel']) !!}
									</div>
								</div>
								<div class="form-group {!! ( count($errors->get('mobile')) ) >0 ? 'has-error' : '' !!} col-md-5">
									{!! Form::label('tel', 'Mobile :', ['class' => 'col-sm-4 control-label']) !!}
									<div class="col-sm-12">
										{!! Form::input('text', 'client_mobile', @$value, ['class' => 'form-control', 'placeholder' => 'Phone', 'id' => 'tel']) !!}
									</div>
								</div>
						</div><br/>

						<div class="form-group col-lg-12">
							<div class="col-sm-offset-2 col-sm-10">
								<p>{!! Form::submit('Update', ['class' => 'btn btn-primary btn-lg btn-block']) !!}</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

@endsection


@section('jquery')
////////////////////////////////////////////////////////////////////////////////////
// ucwords input
	$(document).on('keyup', '#pel', function () {
	// $("input").keyup(function() {
		tch(this);
	});

////////////////////////////////////////////////////////////////////////////////////
// uppercase input for tracking number and customer section
	$(document).on('keyup', '#apel, #catel', function () {
		uch(this);
	});

////////////////////////////////////////////////////////////////////////////////////
@endsection
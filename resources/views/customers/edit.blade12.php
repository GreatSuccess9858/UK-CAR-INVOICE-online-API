@extends('layout.master')

@section('content')
	@include('layout.errorform')
	@include('layout.info')

	<div class="row">
		<p>
			<a href="{!! route('customers.index') !!}" class="btn btn-info" style="margin-top:15px;">Back to customers list</a>
		</p>
	</div>

	{!! Form::model($customers, [ 'route' => ['customers.update', $customers->id], 'method' => 'PATCH', 'class' => 'form-horizontal', 'autocomplete' => 'off']) !!}

	<div class="col-md-12" style="margin-top:80px;">
		<div class="panel panel-default" style="width: 80%; margin-left: 15%;">
			<div class="panel-heading" style="font-size:30px; text-align: center;">Edit Customer</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<div class="form-group {!! ( count($errors->get('client'))  > 0 )? 'has-error' : '' !!}">
							{!! Form::label('pel', 'Customer Name :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'client', @$value, ['class' => 'form-control', 'placeholder' => 'Customer', 'id' => 'pel']) !!}
							</div>
						</div>
						<div class="form-group {!! ( count($errors->get('client_address')) ) >0 ? 'has-error' : '' !!}">
							{!! Form::label('apel', 'Customer Address :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'client_address', @$value, ['class' => 'form-control', 'placeholder' => 'Customer Address', 'id' => 'apel']) !!}
							</div>
						</div>
						<div class="form-group {!! ( count($errors->get('client_poskod')) ) >0 ? 'has-error' : '' !!}">
							{!! Form::label('pos', 'Postcode :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'client_poskod', @$value, ['class' => 'form-control', 'placeholder' => 'Postcode', 'id' => 'pos']) !!}
							</div>
						</div>
						<div class="form-group {!! ( count($errors->get('client_phone')) ) >0 ? 'has-error' : '' !!}">
							{!! Form::label('tel', 'Phone :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'client_phone', @$value, ['class' => 'form-control', 'placeholder' => 'Phone', 'id' => 'tel']) !!}
							</div>
						</div>
						<div class="form-group {!! ( count($errors->get('client_email')) ) >0 ? 'has-error' : '' !!}">
							{!! Form::label('tela', 'Email :', ['class' => 'col-sm-2 control-label']) !!}
							<div class="col-sm-10">
								{!! Form::input('text', 'client_email', @$value, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'tela']) !!}
							</div>
						</div>
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
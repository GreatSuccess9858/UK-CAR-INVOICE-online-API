@extends('layout.master')

@section('content')
@if(auth()->user()->id_group == 1 ) 
	<div class="row"><p><a href="{!! route('user.index') !!}" class="btn btn-info">Back to users</a></p></div>
@endif
	@include('layout.errorform')
	@include('layout.info')
	{!! Form::model($user, [ 'route' => [ 'user.update', $user->slug ], 'method' => 'PATCH', 'class' => 'form-horizontal', 'id' => 'form', 'enctype' => 'multipart/form-data']) !!}

<div class="panel panel-default" style="margin-top: 100px; width:80%; margin-left:15%;" >

<div class="panel-heading" style="font-size: 30px; text-align:center;">Edit Account</div>
	<div class="panel-body">
		@if(auth()->user()->id_group == 1 )
		<div class="form-group {!! ( count($errors->get('name')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('nam', 'Name :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'name', $user->name, ['class' => 'form-control put', 'placeholder' => 'Name', 'id' => 'nam']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('name')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('usernam', 'Username :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::text('username', @$value, ['class' => 'form-control put', 'placeholder' => 'Username', 'id' => 'usernam']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('email')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('email', 'Email :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('password')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pass', 'Password :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password', null, ['class' => 'form-control', 'placeholder' => 'Password', 'id' => 'pass']) !!}
			</div>
		</div>

		<div class="form-group {!! ( count($errors->get('password_confirmation')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('pass1', 'Password :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('password', 'password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Password Confirmation', 'id' => 'pass1']) !!}
			</div>
		</div>

		<?php
		foreach ($gr as $key) {
			$lm[$key->id] = $key->group;
		}
		?>


			<div class="form-group {!! ( count($errors->get('id_group')) ) >0 ? 'has-error' : '' !!}">
				{!! Form::label('ug', 'User Group :', ['class' => 'col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::select('id_group', $lm, $user->id_group,['class' => 'form-control', 'id' => 'ug', 'placeholder' => 'Choose User Group']) !!}
				</div>
			</div>
			<div class="form-group {!! ( count($errors->get('color')) ) >0 ? 'has-error' : '' !!}">
				{!! Form::label('rgba', 'Choose Your Color :', ['class' => 'col-sm-2 control-label']) !!}
				<div class="col-sm-10">
					{!! Form::input('text', 'color', @$value, ['class' => 'form-control ', 'id' => 'rgba' ]) !!}
				</div>
			</div>
		@else
			{!! Form::hidden('id_group', $user->id_group) !!}
		@endif

		<div class="form-group {!! ( count($errors->get('image')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('logo', 'Logo :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				<input type="file" name="image" id="image" class="form-control">
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('bname')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('bname', 'BusinessName :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'bname', $user->bname, ['class' => 'form-control put', 'placeholder' => 'BusinessName', 'id' => 'bname']) !!}
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('baddress')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('baddress', 'BusinessAddress :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'baddress', $user->baddress, ['class' => 'form-control put', 'placeholder' => 'BusinessAddress', 'id' => 'baddress']) !!}
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('baddress2')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('baddress2', 'BusinessAddress 2nd Line:', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'baddress2', $user->baddress2, ['class' => 'form-control put', 'placeholder' => 'BusinessAddress 2nd Line', 'id' => 'baddress2']) !!}
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('city')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('city', 'City :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'city', $user->city, ['class' => 'form-control put', 'placeholder' => 'City', 'id' => 'city']) !!}
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('county')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('county', 'County :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'county', $user->county, ['class' => 'form-control put', 'placeholder' => 'County', 'id' => 'county']) !!}
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('postcode')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('postcode', 'PostCode :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'postcode', $user->postcode, ['class' => 'form-control put', 'placeholder' => 'PostCode', 'id' => 'postcode']) !!}
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('businesspn')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('businesspn', 'Business Phone Number :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'businesspn', $user->businesspn, ['class' => 'form-control put', 'placeholder' => 'Business Phone Number', 'id' => 'businesspn']) !!}
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('businessemail')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('businessemail', 'Business Email Address :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'businessemail', $user->businessemail, ['class' => 'form-control put', 'placeholder' => 'Business Email Address', 'id' => 'businessemail']) !!}
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('vat')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('vat', 'VAT Number :', ['class' => 'col-sm-2 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'vat', $user->vat, ['class' => 'form-control put', 'placeholder' => 'VAT Number', 'id' => 'vat']) !!}
			</div>
		</div>
		@if(auth()->user()->id_group == 1 )
		<div class="form-group {!! ( count($errors->get('bownername')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('bownername', 'Business Owner/Manager Name :', ['class' => 'col-sm-3 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'bownername', $user->bownername, ['class' => 'form-control put', 'placeholder' => 'Business Owner/Manager Name', 'id' => 'bownername']) !!}
			</div>
		</div>
		<div class="form-group {!! ( count($errors->get('bownernum')) ) >0 ? 'has-error' : '' !!}">
			{!! Form::label('bownernum', 'Business Owner Contact Number :', ['class' => 'col-sm-3 control-label']) !!}
			<div class="col-sm-10">
				{!! Form::input('text', 'bownernum', $user->bownernum, ['class' => 'form-control put', 'placeholder' => 'Business Owner Contact Number', 'id' => 'bownernum']) !!}
			</div>
		</div>
		@endif
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				{!! Form::submit('Update', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
			</div>
		</div>
	{!! Form::close() !!}
</div>
</div>

@endsection


@section('jquery')

$("#nam").keyup(function() {
	tch(this);
});

$("#usernam, #email").keyup(function() {
	lch(this);
});

$('#rgba').minicolors({
	format: 'rgb',
	opacity: true,
	theme: 'bootstrap',
});

$('#ug').select2({
	placeholder: 'Please Choose'
});
////////////////////////////////////////////////////////////////////////////////////
// bootstrap validator
$("#form").bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		name: {
			validators: {
				notEmpty: {
					message: 'Please insert your name. '
				}
			}
		},
		email: {
			validators: {
				notEmpty: {
					message: 'Please insert your email. '
				},
				regexp: {
					regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
					message: 'Please insert your valid email address. '
				},
			}
		},
		username: {
			message: 'The username is not valid',
			validators: {
				notEmpty: {
					message: 'The username is required and cannot be empty'
				},
				stringLength: {
					min: 6,
					max: 10,
					message: 'The username must be more than 6 and less than 10 characters long'
				},
				regexp: {
					regexp: /^[a-zA-Z0-9_]+$/,
					message: 'The username can only consist of alphabetical, number and underscore'
				},
			}
		},
		password: {
			validators: {
				notEmpty: {
					message: 'Please insert your password. '
				},
				regexp: {
					regexp: /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/,
					message: 'Passwords are 8-16 characters with uppercase letters, lowercase letters and at least one number. '
				},
			}
		},
		password_confirmation: {
			validators: {
				notEmpty: {
					message: 'Please insert your confirmation password. '
				},
				identical: {
					field: 'password',
					message: 'The password and its confirmation are not the same. '
				}
			}
		},
		id_group: {
			validators: {
				notEmpty: {
					message: 'Please choose an option. '
				}
			}
		},
		color: {
			validators: {
				notEmpty: {
					message: 'Please choose a color. '
				}
			}
		},
	}
})

////////////////////////////////////////////////////////////////////////////////////

@endsection
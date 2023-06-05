@extends('layout.master')

@section('content')
<div class="nk-content ">
	<div class="container-fluid">
		@include('layout.errorform')
		@include('layout.info')
		<div class="nk-content-body">
			<div class="nk-block nk-block-lg">
				<div class="nk-block-head">
					<div class="nk-block-head-content">
						<h4 class="nk-block-title page-title">Print Report</h4>
						<div class="nk-block-des">
						</div>
					</div>
				</div>
			</div> <!-- nk-block -->
			<div class="nk-block nk-block-lg">
				<div class="nk-block-head">
					<div class="nk-block-head-content">
						<h4 class="nk-block-title">Sales Report</h4>
						<div class="nk-block-des">
						</div>
					</div>
				</div>
				<div class="card card-preview">
					<div class="card-inner">
						{!! Form::open(['route' => 'printreport.store', 'class' => 'form-horizontal', 'id' => 'salesform', 'files' => true, 'autocomplete' => 'off']) !!}
						<div class="row gy-4">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="form-label">Start Date</label>
									<div class="form-control-wrap">
										{!! Form::input('text', 'from', @$value, ['class' => 'form-control date-picker', 'placeholder' => 'Start Date', 'id' => 'from1', 'data-date-format'=>'yyyy-mm-dd']) !!}
									</div>
								</div>
								
								<?php
								if (auth()->user()->id_group == 1) {
									// $us = App\User::all();
									$us = App\User::where('id_group', '2')->get();
								} else {
									$us = App\User::where('id', auth()->user()->id)->get();
								}
								foreach($us as $usr) {
									$user[$usr->id] = $usr->name;
								}
								?>
								<div class="form-group {!! ( count($errors->get('user')) ) >0 ? 'has-error' : '' !!}">
									{!! Form::label('seller', 'Merchandiser :', ['class' => 'form-label']) !!}
									<div class="form-control-wrap">
										{!! Form::select('user[]', $user, @$value, ['class' => 'form-controlform-select form-control form-control-lg', 'id' => 'seller', 'multiple' => 'multiple']) !!}
									</div>
								</div>
								<div class="form-group">
									<div class="form-control-wrap">
										{!! Form::submit('Show', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
									</div>
								</div>
								
							</div>
							<div class = "col-sm-6">
								<div class="form-group">
									<label class="form-label">End Date</label>
									<div class="form-control-wrap">
										{!! Form::input('text', 'to', @$value, ['class' => 'form-control date-picker', 'placeholder' => 'End Date', 'id' => 'to1', 'data-date-format'=>'yyyy-mm-dd']) !!}
									</div>
								</div>
							</div>
						</div>
						{!! Form::close() !!}
					</div>
				</div><!-- .card-preview -->
			</div> <!-- nk-block -->

			<div class="nk-block nk-block-lg">
				<div class="nk-block-head">
					<div class="nk-block-head-content">
						<h4 class="nk-block-title">Audit</h4>
						<div class="nk-block-des">
						</div>
					</div>
				</div>
				<div class="card card-preview">
					<div class="card-inner">
						{!! Form::open(['route' => 'printreport.audit', 'class' => 'form-horizontal', 'id' => 'salesform', 'files' => true, 'autocomplete' => 'off']) !!}
						<div class="row gy-4">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="form-label">Start Date</label>
									<div class="form-control-wrap">
										{!! Form::input('text', 'from1', @$value, ['class' => 'form-control date-picker', 'placeholder' => 'Start Date', 'id' => 'from1', 'data-date-format'=>'yyyy-mm-dd']) !!}
									</div>
								</div>
								
								<?php
								if (auth()->user()->id_group == 1) {
									// $us = App\User::all();
									$us = App\User::where('id_group', '2')->get();
								} else {
									$us = App\User::where('id', auth()->user()->id)->get();
								}
								foreach($us as $usr) {
									$user[$usr->id] = $usr->name;
								}
								?>
								<div class="form-group {!! ( count($errors->get('user1')) ) >0 ? 'has-error' : '' !!}">
									{!! Form::label('seller', 'Merchandiser :', ['class' => 'form-label']) !!}
									<div class="form-control-wrap">
										{!! Form::select('user1[]', $user, @$value, ['class' => 'form-controlform-select form-control form-control-lg', 'id' => 'seller', 'multiple' => 'multiple']) !!}
									</div>
								</div>
								<div class="form-group">
									<div class="form-control-wrap">
										{!! Form::submit('Show', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
									</div>
								</div>
								
							</div>
							<div class = "col-sm-6">
								<div class="form-group">
									<label class="form-label">End Date</label>
									<div class="form-control-wrap">
										{!! Form::input('text', 'to1', @$value, ['class' => 'form-control date-picker', 'placeholder' => 'End Date', 'id' => 'to1', 'data-date-format'=>'yyyy-mm-dd']) !!}
									</div>
								</div>
							</div>
						</div>
						{!! Form::close() !!}
					</div>
				</div><!-- .card-preview -->
			</div> <!-- nk-block -->

			<div class="nk-block nk-block-lg">
				<div class="nk-block-head">
					<div class="nk-block-head-content">
						<h4 class="nk-block-title">Income Report</h4>
						<div class="nk-block-des">
						</div>
					</div>
				</div>
				<div class="card card-preview">
					<div class="card-inner">
						{!! Form::open(['route' => 'printreport.payment', 'class' => 'form-horizontal', 'id' => 'salesform', 'files' => true, 'autocomplete' => 'off']) !!}
						<div class="row gy-4">
							<div class="col-sm-6">
								<div class="form-group">
									<label class="form-label">Start Date</label>
									<div class="form-control-wrap">
										{!! Form::input('text', 'from2', @$value, ['class' => 'form-control date-picker', 'placeholder' => 'Start Date', 'id' => 'from1', 'data-date-format'=>'yyyy-mm-dd']) !!}
									</div>
								</div>
								
								<?php
								if (auth()->user()->id_group == 1) {
									// $us = App\User::all();
									$us = App\User::where('id_group', '2')->get();
								} else {
									$us = App\User::where('id', auth()->user()->id)->get();
								}
								foreach($us as $usr) {
									$user[$usr->id] = $usr->name;
								}
								?>
								<div class="form-group {!! ( count($errors->get('user2')) ) >0 ? 'has-error' : '' !!}">
									{!! Form::label('seller', 'Merchandiser :', ['class' => 'form-label']) !!}
									<div class="form-control-wrap">
										{!! Form::select('user2[]', $user, @$value, ['class' => 'form-controlform-select form-control form-control-lg', 'id' => 'seller', 'multiple' => 'multiple']) !!}
									</div>
								</div>
								<div class="form-group">
									<div class="form-control-wrap">
										{!! Form::submit('Show', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
									</div>
								</div>
								
							</div>
							<div class = "col-sm-6">
								<div class="form-group">
									<label class="form-label">End Date</label>
									<div class="form-control-wrap">
										{!! Form::input('text', 'to2', @$value, ['class' => 'form-control date-picker', 'placeholder' => 'End Date', 'id' => 'to1', 'data-date-format'=>'yyyy-mm-dd']) !!}
									</div>
								</div>
							</div>
						</div>
						{!! Form::close() !!}
					</div>
				</div><!-- .card-preview -->
			</div> <!-- nk-block -->
		</div>
	</div>
</div>

@endsection


@section('jquery')

////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$('select').select2();

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
	$('#from1').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#salesform').bootstrapValidator('revalidateField', 'from');
			var minDate = $('#from1').val();
			$('#to1').datepicker('setStartDate', minDate);
	});

	$('#to1').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#salesform').bootstrapValidator('revalidateField', 'to');
			var maxDate = $('#to1').val();
			$('#from1').datepicker('setEndDate', maxDate);
	});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validator
$('#salesform').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		from: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		to: {
			validators: {
				notEmpty: {
					message: 'Please choose date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		'user[]': {
			validators: {
				notEmpty: {
					message: 'Please choose merchandiser. '
				}
			}
		}
	}
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
	$('#from2').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#auditsales').bootstrapValidator('revalidateField', 'from1');
			var minDate = $('#from2').val();
			$('#to2').datepicker('setStartDate', minDate);
	});

	$('#to2').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#auditsales').bootstrapValidator('revalidateField', 'to1');
			var maxDate = $('#to2').val();
			$('#from2').datepicker('setEndDate', maxDate);
	});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validator
$('#auditsales').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		from1: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		to1: {
			validators: {
				notEmpty: {
					message: 'Please choose date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		'user1[]': {
			validators: {
				notEmpty: {
					message: 'Please choose merchandiser. '
				}
			}
		}
	}
});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Date Input Helper
	$('#from3').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#incomesales').bootstrapValidator('revalidateField', 'from2');
			var minDate = $('#from3').val();
			$('#to3').datepicker('setStartDate', minDate);
	});

	$('#to3').datepicker({
		autoclose:true,
		format:'yyyy-mm-dd',
		todayHighlight : false,
	})
	.on('changeDate show', function(e) {
		$('#incomesales').bootstrapValidator('revalidateField', 'to2');
			var maxDate = $('#to3').val();
			$('#from3').datepicker('setEndDate', maxDate);
	});

////////////////////////////////////////////////////////////////////////////////////////////////////////////
// validator
$('#incomesales').bootstrapValidator({
	feedbackIcons: {
		valid: 'glyphicon glyphicon-ok',
		invalid: 'glyphicon glyphicon-remove',
		validating: 'glyphicon glyphicon-refresh'
	},
	fields: {
		from2: {
			validators: {
				notEmpty: {
					message: 'Please insert date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		to2: {
			validators: {
				notEmpty: {
					message: 'Please choose date. '
				},
				date: {
					message: 'The date is not valid',
					format: 'YYYY-MM-DD'
				},
			}
		},
		'user2[]': {
			validators: {
				notEmpty: {
					message: 'Please choose merchandiser. '
				}
			}
		}
	}
});


@endsection
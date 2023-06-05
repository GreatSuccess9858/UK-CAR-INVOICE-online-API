<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html lang=en>
<head>

<base href="../">
    <meta charset="utf-8" Content-Type="text/html">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="A powerful and conceptual apps base dashboard template that especially build for developers and programmers.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="./images/favicon.png">
    <!-- Page Title  -->
    <title>{{ config('app.name') }}</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{ asset('admin/css/dashlite.css?ver=2.0.0') }}">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}"> -->
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/css/theme.css?ver=2.0.0') }}">
</head>
<!-- JavaScript -->
	<!-- <script src="/js/ucwords.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.bundle.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.7.0/standard/ckeditor.js"></script> -->
	<script src="{{ asset('admin/js/bundle.js?ver=2.0.0') }}"></script>	
    <script src="{{ asset('admin/js/scripts.js?ver=2.0.0') }}"></script>
    <!-- <script src="{{ asset('admin/js/table2csv.js') }}"></script>
    <script src="{{ asset('admin/js/charts/gd-default.js?ver=2.0.0') }}"></script>
    <script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script> -->
<body>

@include('layout.gnav')

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			@section('content')
			@show
		</div>
		<div class="footer">
			<p class="text-center">copyright : terajutara resources (m) sdn bhd {!! date('Y') !!}</p>
		</div>
	</div>
</div>
<!-- <script src="/js/app.js" type="text/javascript" ></script> -->
<!-- @include('layout.jscript') -->
</body>
</html>

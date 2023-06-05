<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
<base href="../">
    <meta charset="utf-8">
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
    <link rel="stylesheet" href="{{ asset('css/mystyle.css')}}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('admin/css/theme.css?ver=2.0.0') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            @if (Auth::guest())
                <!-- wrap @s -->
            <div class="nk-wrap nk-wrap-nosidebar">
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="" class="logo-link">
                                <!-- <img class="logo-light logo-img logo-img-lg" src="./images/logo.jpg" srcset="./images/logo2x.jpg 2x" alt="logo"> -->
                                <img src="./images/signLogo.png" srcset="./images/logo-dark2x.png 2x" alt="logo-dark" style="width: 150px; height:150px;">
                            </a>
                        </div>
                        <div class="card card-bordered">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign-In</h4>
                                    </div>
                                </div>
                                {!! Form::open(['route' => 'auth.store', 'class' => 'form-horizontal', 'id' => 'form', 'autocomplete' => 'off']) !!}
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="default-01">Email or Username</label>
                                        </div>
                                        {!! Form::text('username', @$value, ['class' => 'form-control form-control-lg', 'id' => 'na', 'placeholder' => 'Username', 'autocomplete' => 'off']) !!}
                                    </div>
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label" for="password">Password</label>
                                            <!-- <a class="link link-primary link-sm" href="{!! route('forgotpassword.create') !!}">Forgot Password?</a> -->
                                        </div>
                                        <div class="form-control-wrap">
                                            <!-- <a href="#" class="form-icon form-icon-right passcode-switch" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a> -->
                                            {!! Form::input('password', 'password', @$value, ['class' => 'form-control form-control-lg', 'id' => 'pas', 'placeholder' => 'Password']) !!}
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        {!! Form::submit('Login', ['class' => 'btn btn-lg btn-primary btn-block']) !!}
                                    </div>
                                </form>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- wrap @e -->
            </div>
            <!-- content @e -->

            @section('jquery')

            $("#na").keyup(function() {
                lch(this);
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
                    // email: {
                    // 	validators: {
                    // 		notEmpty: {
                    // 			message: 'Please insert your email '
                    // 		},
                    // 		// emailAddress: {
                    // 		// 	message: 'Please insert your valid email address'
                    // 		// },
                    // 		regexp: {
                    // 			regexp: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                    // 			message: ' Please insert your valid email address'
                    // 		},
                    // 		different: {
                    // 			field: 'password',
                    // 			message: 'The e-mail and password cannot be the same as each other'
                    // 		},
                    // 	}
                    // },
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
                                message: 'Please insert your password '
                            },
                        }
                    },
                }
            })

            ////////////////////////////////////////////////////////////////////////////////////


            @endsection

            @else
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head" style="height:100px;">
                    <div class="nk-sidebar-brand">
                        <a href="{{route('sales.index')}}" class="logo-link nk-sidebar-logo">
                            <img class="" src="{{ asset('images/logo1.png') }}"  alt="logo" style="height:11View Profile0px; width:100px; margin-top:30%;">
                        </a>
                    </div>
                    <div class="nk-menu-trigger mr-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    </div>
                </div><!-- .nk-sidebar-element -->
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="{!! route('sales.index') !!}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">Invoice</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{!! route('printreport.index') !!}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-printer"></em></span>
                                        <span class="nk-menu-text">Print Report</span>
                                    </a>
                                </li>
                                @if(auth()->user()->id_group == 1) 
                                <li class="nk-menu-item">
                                    <a href="{!! route('user.index') !!}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">User Management</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{!! route('preferences.edit', 1) !!}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-setting"></em></span>
                                        <span class="nk-menu-text">Perferences</span>
                                    </a>
                                </li>
                                @else
                                <li class="nk-menu-item">
                                    <a href="{!! route('customers.index') !!}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Customer Management</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{!! route('user.edit', auth()->user()->slug) !!}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Account Management</span>
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div>
            <!-- sidebar @e -->
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <div class="nk-header nk-header-fixed is-light">
                    <div class="container-fluid">
                        <div class="nk-header-wrap">
                            <div class="nk-menu-trigger d-xl-none ml-n1">
                                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                            </div>
                            <div class="nk-header-brand d-xl-none">
                                <!--<a href="html/index.html" class="logo-link">-->
                                <!--    <img class="logo-light logo-img" src="{{ asset('images/White.svg') }}" srcset="./images/logo2x.png 2x" alt="logo">-->
                                <!--    <img class="logo-dark logo-img" src="{{ asset('images/Black.svg') }}" srcset="./images/logo-dark2x.png 2x" alt="logo-dark">-->
                                <!--</a>-->
                            </div><!-- .nk-header-brand -->
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                                <div class="user-info d-none d-md-block">
                                                    <div class="user-status">{{auth()->user()->name}}</div>
                                                    <div class="user-name dropdown-indicator">{{auth()->user()->name}}</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>{{strtoupper(substr(auth()->user()->name, 0, 1))}}</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{auth()->user()->name}}</span>
                                                        <span class="sub-text">{{auth()->user()->name}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    
                                                        <form method="POST" action="{!! route('auth.destroy') !!}">
                                                                                    @csrf
                                                            <li><a href="{!! route('auth.destroy') !!}" onclick="event.preventDefault();
                                                                                            this.closest('form').submit();"><em class="icon ni ni-signout"></em><span>Log out</span></a></li>
                                                        </form>                                                        
                                                      
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </li><!-- .dropdown -->
                                    <!-- .dropdown -->
                                </ul><!-- .nk-quick-nav -->
                            </div><!-- .nk-header-tools -->
                        </div><!-- .nk-header-wrap -->
                    </div><!-- .container-fliud -->
                </div>

                <!-- main header @e -->
                <!-- content @s -->
                @section('content')
				@show

                <!-- content @e -->
            </div>
            @endif
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>

    <!-- footer @s -->
    <div class="nk-footer">
        <div class="container-fluid">
            <div class="nk-footer-wrap center">
                <div class="nk-footer-copyright">
                                <span>
                                    &copy; copyright : <?php echo date('Y-m-d'); ?>
                                </span>
                </div>
                <!-- <div class="nk-footer-links">
                    <ul class="nav nav-sm">
                        <li class="nav-item"><a class="nav-link" href="#">Terms</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Privacy</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Help</a></li>
                    </ul>
                </div> -->
            </div>
        </div>
    </div>
    <!-- footer @e -->


    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('admin/js/bundle.js?ver=2.0.0') }}"></script>
    <script src="{{ asset('admin/js/scripts.js?ver=2.0.0') }}"></script>
    <script src="{{ asset('admin/js/table2csv.js') }}"></script>
    <script src="{{ asset('admin/js/charts/gd-default.js?ver=2.0.0') }}"></script>
    <script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>


</body>

</html>
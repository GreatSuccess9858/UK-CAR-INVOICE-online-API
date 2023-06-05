


<!-- Navigation -->

<body class="nk-body bg-lighter npc-general has-sidebar ">
    <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{route('sales.index')}}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{public_path().'/'}}"  alt="logo">
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
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Invoice</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{!! route('printreport.index') !!}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Print Report</span>
                                    </a>
                                </li>

								<li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Invoice Management</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">Invoice Management</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="{!! route('product.create') !!}" class="nk-menu-link"><span class="nk-menu-text">Adding Product</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="{!! route('category.create') !!}" class="nk-menu-link"><span class="nk-menu-text">Adding Category</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Details - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-profile-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Profile - Regular</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li>

								<li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Pre-Built Pages</h6>
                                </li><!-- .nk-menu-heading -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                        <span class="nk-menu-text">User Manage</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">User List - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-list-compact.html" class="nk-menu-link"><span class="nk-menu-text">User List - Compact</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Details - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/user-profile-regular.html" class="nk-menu-link"><span class="nk-menu-text">User Profile - Regular</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                        <span class="nk-menu-text">AML / KYCs</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        <li class="nk-menu-item">
                                            <a href="html/kyc-list-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC List - Regular</span></a>
                                        </li>
                                        <li class="nk-menu-item">
                                            <a href="html/kyc-details-regular.html" class="nk-menu-link"><span class="nk-menu-text">KYC Details - Regular</span></a>
                                        </li>
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->

                                
                                <li class="nk-menu-item">
                                    <a href="{!! route('sales.index') !!}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Invoice</span>
                                    </a>
                                </li>
                                <li class="nk-menu-item">
                                    <a href="{!! route('sales.index') !!}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-users-fill"></em></span>
                                        <span class="nk-menu-text">Invoice</span>
                                    </a>
                                </li>
                            </ul><!-- .nk-menu -->
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
                                                    <div class="user-status">Administrator</div>
                                                    <div class="user-name dropdown-indicator">Administrator</div>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-right dropdown-menu-s1">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>AB</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">Administrator</span>
                                                        <span class="sub-text">Email</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li><a href="#"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                    <!-- <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li> -->
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    
                                                        <!-- <form method="POST" action="{{ route('logout') }}">
                                                                                    @csrf
                                                            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                                                            this.closest('form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                                        </form>                                                         -->
                                                      
                                                    
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
                @yield('content')

                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright">
                                <span  style="text-align: center;">
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
            </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->
    </div>
    <!-- app-root @e -->
    <!-- JavaScript -->
    <script src="{{ asset('admin/js/bundle.js?ver=2.0.0') }}"></script>
    <script src="{{ asset('admin/js/scripts.js?ver=2.0.0') }}"></script>
    <script src="{{ asset('admin/js/table2csv.js') }}"></script>
    <script src="{{ asset('admin/js/charts/gd-default.js?ver=2.0.0') }}"></script>
    <script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>

   <script>
   $.urlParam = function(name){
    	var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
    	if(results != null){
    	   return results[1] || 0; 
    	}
    	else{
    	    return 0
    	}
    }
   var date = new Date();
   var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());

   $(document).ready(function() { 
        $('#changeLang').on('change', function() {
            var lang = '';
            if(this.value == 'en'){
                lang = 'en';
            } else {
                lang = 'it';
            }
            // $.ajaxSetup({
            //       headers: {
            //           'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            //       }
            //   });
            // alert(lang);
            // $.ajax({ 
            //     url: "{{url()->current()}}",
            //     data: {'lang': lang},
            //     type: 'get',
            //     dataType: 'json',
            //     success: function(response){
            //         console.log(response);
            //     }
            //     });
            });
    });

   </script> 

</body>


<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
	<div class="container topnav">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

				<ul class="nav navbar-nav navbar-right">
					<li>
						<?php $logo = App\Preferences::find(1) ?>
						<a href="{!! route('auth.index') !!}">
							<!-- <img src=" data:{!! $logo->company_logo_mime !!};base64,{!! $logo->company_logo_image !!}" alt="Home" title="Home" width="5%" class="img-responsive img-rounded"> -->
							Home
						</a>
					</li>
                        @if (Auth::guest())
                            <a href="{!! route('login') !!}">Login</a></li>
                        @endif
			@if(Auth::check())
					<li>
						<a href="{!! route('user.edit', auth()->user()->slug) !!}">Welcome {!! auth()->user()->name !!}</a>
					</li>
					<li>
						<a href="{!! route('sales.index') !!}">Invoice</a>
					</li>
					<li>
						<a href="{!! route('printreport.index') !!}">Print Report</a>
					</li>
					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Invoice Management<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('product.create') !!}">Adding Product</a></li>
								<li><a href="{!! route('category.create') !!}">Adding Category</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('customers.index') !!}">Customers List</a></li>
								<li role="separator" class="divider"></li>
							</ul>
						</div>
					</li>
					@if((auth()->user()->id_group) == 1)
					<li>
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
								Setting<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('user.create') !!}">Add User</a></li>
								<li><a href="{!! route('usergroup.create') !!}">Add User Group</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('banks.index') !!}">Bank Activation</a></li>
								<li role="separator" class="divider"></li>
								<li><a href="{!! route('preferences.edit', 1) !!}">Preferences</a></li>
								<li role="separator" class="divider"></li>
							</ul>
						</div>
					</li>
					@endif
					<li><a href="{!! route('auth.destroy') !!}">Logout</a></li>
			@endif
				</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container -->
</nav>

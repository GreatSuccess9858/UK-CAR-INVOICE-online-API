


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


                <!-- content @e -->
                <!-- footer @s -->
                <div class="nk-footer">
                    <div class="container-fluid">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright">
                                <span style="text-align: center;">
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




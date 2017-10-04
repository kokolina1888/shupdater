<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="{{ asset('css/basic.css') }}" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{ asset('css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('themes/explorer/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/plugins/sortable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/fileinput.js') }}" type="text/javascript"></script>
    <!-- <script src="{{ asset('js/locales/fr.js') }}" type="text/javascript"></script> -->
    <script src="{{ asset('js/locales/bg.js') }}" type="text/javascript"></script>
    <script src="{{ asset('themes/explorer/theme.js') }}" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('home') }}">COMPANY NAME</a>
            </div>           
        </nav>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <div class="inner-text">                            
                                {{ Auth::user()->username}}
                                <br />
                                <small>Последно влизане : {{ Carbon\Carbon::parse(Auth::user()->last_login_at)->format('d-m-Y')}} </small>
                                <p id="logout">
                                 <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                        </p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a class="active-menu" href="{{ route('home') }}"><i class="fa fa-dashboard "></i>Панел за управление</a>
                    </li>
                    <li>
                        <a href="{{ route('update_products_quantity_prices') }}"><i class="fa fa-desktop "></i>Актуализиране цени и количества</a>                       
                    </li>
                    <li>
                        <a href="{{ route('get_product_info') }}"><i class="fa fa-search" aria-hidden="true"></i>Търсене на продукти </a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cloud-upload" aria-hidden="true"></i>Въвеждане на нови продукти <br> !?Изтрива всички продукти и въвежда нови?!</a>
                    </li>   
                     <li>
                        <a href="#"><i class="fa fa-suitcase" aria-hidden="true"></i>Прекатегоризация на продукти</a>
                    </li>                   
                </ul>
            </div>
        </nav>
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Панел за управление</h1>
                    <h1 class="page-subhead-line">на информацията за продукти </h1>

                </div>
            </div>
            <!-- /. ROW  -->

            @yield('content')

            <!-- /. ROW  -->              
        </div>
    </div>
</div>

<div id="footer-sec">
    &copy; 2017 Вашатафирма | Дизайн : <a href="#" target="_blank">ДИЗАЙН.com</a>
</div>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<!-- <script src="assets/js/jquery-1.10.2.js"></script> -->
<!-- BOOTSTRAP SCRIPTS -->
<!-- <script src="assets/js/bootstrap.js"></script> -->
<!-- METISMENU SCRIPTS -->
<!-- <script src="assets/js/jquery.metisMenu.js"></script> -->
<!-- CUSTOM SCRIPTS -->
<!-- <script src="assets/js/custom.js"></script> -->
</body>
</html>

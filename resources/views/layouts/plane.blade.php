<!DOCTYPE html>
<html lang="en" ng-app="app">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="_token" content="{!! csrf_token() !!}" />
    

    <title>Proces de productie</title>

    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/metisMenu/metisMenu.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/timeline.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/sb-admin-2.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/sb-admin-3.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/morris.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/toastr.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/font-awesome-4.5.0/css/font-awesome.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/awesome-bootstrap-checkbox.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/jquery-ui.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/x-editable/bootstrap-editable.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/jquery.dataTables.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/fixedColumns.bootstrap.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/dataTables.bootstrap.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/plugins/keyTable.dataTables.min.css") }}" />


    @yield('head_scripts')

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset("assets/css/main.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/quick-sidebar.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/layout-chat.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/darkblue.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/bootstrap-switch.min.css") }}" />
    <link rel="stylesheet" href="{{ asset("assets/css/simple-line-icons.min.css") }}" />
     
</head>

<body> 
 
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <div class="navbar-brand" >Structura PrP
                <a id="menu-toggle" href="#"><i class="fa fa-chevron-circle-left" style="margin-left: 5.3em !important;"></i></a>
            </div>
                <a class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" href="#">
                    <i class="fa fa-bars"></i>
                </a>
        </div>
         
    </nav>
    <div id="wrapper" class="active">  
        <div class="navbar-default sidebar active" role="navigation">
            <div class="sidebar-nav navbar-collapse">
	           <ul class="nav" id="side-menu">
                        <li <?php echo Route::getCurrentRoute()->getPrefix() == '' ? 'class="active"' : ''; ?>><a href="{{ url('/') }}"  ><i class="fa fa-tachometer" aria-hidden="true"></i>  Panou de bord</a></li>

                        <li class="has-sub">
                            <a href=""><i class="fa fa fa-cubes" aria-hidden="true"></i> Nomenclator<span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                            <li class="has-sub">
                                <a href="" <?php echo Route::currentRouteName() == 'actiuni::list' || Route::currentRouteName() == 'modalitati::list' || Route::currentRouteName() == 'nivele::list'? 'class="active"' : ''; ?>><i class="fa fa-th-list" aria-hidden="true"></i> Actiuni de productie<span class="fa arrow"></a>
                                 <ul class="nav nav-third-level">
                                    <li><a href="{{ route('actiuni::list') }}"  <?php echo Route::currentRouteName() == 'actiuni::list' ? 'class="active"' : ''; ?>><i class="fa fa-th" aria-hidden="true"></i> Actiuni de productie</a></li>
                                     <li><a href="{{ route('modalitati::list') }}" <?php echo Route::currentRouteName() == 'modalitati::list' ? 'class="active"' : ''; ?> ><i class="fa fa-gavel" aria-hidden="true"></i> Modalitati de realizare</a></li>
                                    <li><a href="{{ route('nivele::list') }}" <?php echo Route::currentRouteName() == 'nivele::list' ? 'class="active"' : ''; ?> ><i class="fa fa-bar-chart" aria-hidden="true"></i> Nivele de grupare</a></li>
                                    <li><a href="{{ route('fluxuri::list') }}" <?php echo Route::currentRouteName() == 'fluxuri::list' ? 'class="active"' : ''; ?> ><i class="fa fa-arrows-h" aria-hidden="true"></i> Tipuri de procese</a></li>
                                    <li><a href="{{ route('operatii::list') }}" <?php echo Route::currentRouteName() == 'operatii::list' ? 'class="active"' : ''; ?> ><i class="fa fa-align-left" aria-hidden="true"></i> Tipuri de operatii</a></li>
                                    <li><a href="{{ route('categorii::list') }}"  <?php echo Route::currentRouteName() == 'categorii::list' ? 'class="active"' : ''; ?>><i class="fa fa-cubes" aria-hidden="true"></i> Categorii i.l.</a></li>
                                </ul>
                            </li>
                            {{-- 3, 9, 10,11, 12, 13, 14, 15, 21, 25, 26,32                                 --}}
                            <li class="has-sub" >
                                <a href="#"><i class="fa fa-wrench" aria-hidden="true"></i> Instrumente de lucru<span class="fa arrow"></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="{{ route('tipuri::list') }}"  <?php echo Route::currentRouteName() == 'tipuri::list' ? 'class="active"' : ''; ?>><i class="fa fa-industry" aria-hidden="true"></i> Tipuri</a></li>
                                    <li><a href="{{ route('moduri::list') }}"  <?php echo Route::currentRouteName() == 'moduri::list' ? 'class="active"' : ''; ?>><i class="fa fa-tasks" aria-hidden="true"></i> Moduri de realizare</a></li>
                                     <li><a href="{{ route('grade::list') }}"  <?php echo Route::currentRouteName() == 'grade::list' ? 'class="active"' : ''; ?>><i class="fa fa-percent" aria-hidden="true"></i> Grade de libetate</a></li>
                                    <li><a href="{{ route('nr_grade::list') }}"  <?php echo Route::currentRouteName() == 'nr_grade::list' ? 'class="active"' : ''; ?>><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Numar de grade </a></li>
                                    <li><a href="{{ route('materiale::list') }}"  <?php echo Route::currentRouteName() == 'materiale::list' ? 'class="active"' : ''; ?>><i class="fa fa-diamond" aria-hidden="true"></i> Tipuri materiale</a></li>
                                    <li><a href="{{ route('categorii-complexe::list') }}"  <?php echo Route::currentRouteName() == 'categorii-complexe::list' ? 'class="active"' : ''; ?>><i class="fa fa-align-left" aria-hidden="true"></i> Categorii i.l. complexe</a></li>
                                    <li><a href="{{ route('alimentare::list') }}"  <?php echo Route::currentRouteName() == 'alimentare::list' ? 'class="active"' : ''; ?>><i class="fa fa-cutlery" aria-hidden="true"></i> Moduri alimentare</a></li>
                                    <li><a href="{{ route('evacuare::list') }}"  <?php echo Route::currentRouteName() == 'evacuare::list' ? 'class="active"' : ''; ?>><i class="fa fa-truck" aria-hidden="true"></i> Moduri evacuare </a></li>
                                    <li><a href="{{ route('consumabile::list') }}"  <?php echo Route::currentRouteName() == 'consumabile::list' ? 'class="active"' : ''; ?>><i class="fa fa-tint" aria-hidden="true"></i> Tipuri consumabile</a></li>

                                    <li><a href="{{ route('caracteristici::list') }}"  <?php echo Route::currentRouteName() == 'caracteristici::list' ? 'class="active"' : ''; ?>><i class="fa fa-server" aria-hidden="true"></i> Caracteristici tehnice</a></li>
                                     <li><a href="{{ route('mod-aplicare::list') }}"  <?php echo Route::currentRouteName() == 'mod-aplicare::list' ? 'class="active"' : ''; ?>><i class="fa fa-sign-language" aria-hidden="true"></i> Moduri folosinta I.L.</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('componente::list') }}"  <?php echo Route::currentRouteName() == 'componente::list' ? 'class="active"' : ''; ?>><i class="fa fa-cogs" aria-hidden="true"></i> Componente rezultate</a></li> 
                            <li><a href="{{ route('zone::list') }}"  <?php echo Route::currentRouteName() == 'zone::list' ? 'class="active"' : ''; ?>><i class="fa fa fa-globe" aria-hidden="true"></i> Zone de lucru</a></li>

                            {{-- 18,19,20 --}}
                             <li class="has-sub" >
                                <a href="#"><i class="fa fa-list-ol" aria-hidden="true"></i> Materii prime<span class="fa arrow"></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="{{ route('tipuri_materii::list') }}"  <?php echo Route::currentRouteName() == 'tipuri_materii::list' ? 'class="active"' : ''; ?>><i class="fa fa-align-center" aria-hidden="true"></i> Tipuri de materie</a></li>
                                     <li><a href="{{ route('forme_materii::list') }}"  <?php echo Route::currentRouteName() == 'forme_materii::list' ? 'class="active"' : ''; ?>><i class="fa fa-plus-square" aria-hidden="true"></i> Forma materiei</a></li>
                                    <li><a href="{{ route('caract_materii::list') }}"  <?php echo Route::currentRouteName() == 'caract_materii::list' ? 'class="active"' : ''; ?>><i class="fa fa-level-up" aria-hidden="true"></i> Caracteristici tehnice</a></li>
                                </ul>
                            </li>

                             <li><a href="{{ route('tip-operatori::list') }}"  <?php echo Route::currentRouteName() == 'tip-operatori::list' ? 'class="active"' : ''; ?>><i class="fa fa-group" aria-hidden="true"></i> Operatori</a></li>

                           </ul>
                        </li>   
                       
                        {{-- 27 - - 32 --}}
                        <li class="has-sub">
                            <a href="#"><i class="fa fa-th" aria-hidden="true"></i> Date generale<span class="fa arrow"></a>   
                            <ul class="nav nav-second-level">  
                                <li><a href="{{ route('instalatii::list') }}"  <?php echo Route::currentRouteName() == 'instalatii::list' ? 'class="active"' : ''; ?>><i class="fa fa-building-o" aria-hidden="true"></i> Fabrici de productie</a></li>
                                                                

                                                    
                                <li><a href="{{ route('operatori-necesari::list') }}"  <?php echo Route::currentRouteName() == 'operatori-necesari::list' ? 'class="active"' : ''; ?>><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Operatori.</a></li>   
                                 <li><a href="{{ route('schimburi-de-lucru::list') }}"  <?php echo Route::currentRouteName() == 'schimburi-de-lucru::list' ? 'class="active"' : ''; ?>><i class="fa fa-retweet" aria-hidden="true"></i> Schimburi de lucru</a></li> 
                                 <li><a href="{{ route('ore-functionale::list') }}"  <?php echo Route::currentRouteName() == 'ore-functionale::list' ? 'class="active"' : ''; ?>><i class="fa fa-hourglass-start" aria-hidden="true"></i> Ore nete functionale</a></li>
                                 <li><a href="{{ route('grad-incarcare::list') }}"  <?php echo Route::currentRouteName() == 'grad-incarcare::list' ? 'class="active"' : ''; ?>><i class="fa fa-percent" aria-hidden="true"></i> Incarcarea orara</a></li>
                                 <li><a href="{{ route('operatori-actuali::list') }}"  <?php echo Route::currentRouteName() == 'operatori-actuali::list' ? 'class="active"' : ''; ?>><i class="fa fa-mortar-board" aria-hidden="true"></i>Tipuri de operatori</a></li>
                            </ul>
                        </li>

                        <li class="has-sub">
                            <a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Date particulare<span class="fa arrow"></a>   
                            <ul class="nav nav-second-level"> 
                                <li><a href="{{ route('aferente-prp::list') }}"  <?php echo Route::currentRouteName() == 'aferente-prp::list' ? 'class="active"' : ''; ?>><i class="fa fa-dot-circle-o" aria-hidden="true"></i> I.L. aferente PrP</a></li>
                                <li><a href="{{ route('optimizari-fl::list') }}"  <?php echo Route::currentRouteName() == 'optimizari-fl::list' ? 'class="active"' : ''; ?>><i class="fa fa-check-square-o" aria-hidden="true"></i> I.L. pentru analiza Fl</a></li>       
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a href="#"><i class="fa fa-align-right" aria-hidden="true"></i> Date pentru analiza<span class="fa arrow"></a>   
                            <ul class="nav nav-second-level"> 
                                <li><a href="{{ route('il-posibile::list') }}"  <?php echo Route::currentRouteName() == 'il-posibile::list' ? 'class="active"' : ''; ?>><i class="fa fa-sort" aria-hidden="true"></i> Centralizatorul  I.L. </a></li>        
                            </ul>
                        </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </div>
    <!-- /#wrapper -->

   <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header" style="padding-bottom: 0px; margin: 15px 5px;"> @yield('title') </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @yield('content')
    </div>
    <!-- /#page-wrapper -->

         

    
    <script src="{{ asset("assets/js/jquery-1.12.3.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/plugins/metisMenu/metisMenu.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/sb-admin-2.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/bootstrap-checkbox.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/autoNumeric.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/plugins/jquery-ui.min.js") }}" type="text/javascript"></script>   
    <script src="{{ asset("assets/js/plugins/bootbox.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/plugins/toastr.min.js") }}" type="text/javascript"></script>   
    <script src="{{ asset("assets/js/util.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/plugins/x-editable/bootstrap-editable.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/brain-socket.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/main.js") }}" type="text/javascript"></script>

    <script src="{{ asset("assets/js/metronic.js") }}" type="text/javascript"></script> 
    <script src="{{ asset("assets/js/bootstrap-switch.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/plugins/dataTables/jquery.dataTables.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/plugins/dataTables/dataTables.bootstrap.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/plugins/dataTables/dataTables.fixedColumns.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/plugins/dataTables/jquery.dataTables.columnFilter.js") }}" type="text/javascript"></script>
    <script src="{{ asset("assets/js/plugins/dataTables/dataTables.keyTable.min.js") }}" type="text/javascript"></script>    
 

    @yield('footer_scripts')

</body>

</html>

@extends('layouts.plane')

@section('body')
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ url ('') }}">SB Admin v2.0 | Laravel 5</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li><a href="{{ url('/') }}"  <?php echo Route::getCurrentRoute()->getPrefix() == '' ? 'class="active"' : ''; ?>><i class="fa fa-tachometer" aria-hidden="true"></i>  Panou de bord</a></li>

                        <li class="has-sub">
                            <a href=""><i class="fa fa fa-cubes" aria-hidden="true"></i> Nomenclator<span class="fa arrow"></a>
                            <ul class="nav nav-second-level">
                            <li class="has-sub">
                                <a href=""><i class="fa fa-th-list" aria-hidden="true"></i> Actiuni de productie<span class="fa arrow"></a>
                                 <ul class="nav nav-third-level">
                                    <li><a href="{{ route('actiuni::list') }}"  <?php echo Route::currentRouteName() == 'actiuni::list' ? 'class="active"' : ''; ?>><i class="fa fa-th" aria-hidden="true"></i> Actiuni de productie</a></li>
                                     <li><a href="{{ route('modalitati::list') }}" <?php echo Route::currentRouteName() == 'modalitati::list' ? 'class="active"' : ''; ?> ><i class="fa fa-gavel" aria-hidden="true"></i> Modalitati de realizare</a></li>
                                    <li><a href="{{ route('nivele::list') }}" <?php echo Route::currentRouteName() == 'nivele::list' ? 'class="active"' : ''; ?> ><i class="fa fa-bar-chart" aria-hidden="true"></i> Nivele de grupare</a></li>
                                    <li><a href="{{ route('fluxuri::list') }}" <?php echo Route::currentRouteName() == 'fluxuri::list' ? 'class="active"' : ''; ?> ><i class="fa fa-arrows-h" aria-hidden="true"></i> Tipuri procese productie</a></li>
                                    <li><a href="{{ route('operatii::list') }}" <?php echo Route::currentRouteName() == 'operatii::list' ? 'class="active"' : ''; ?> ><i class="fa fa-asl-interpreting" aria-hidden="true"></i> Tipuri de operatii necesare</a></li>
                                    <li><a href="{{ route('categorii::list') }}"  <?php echo Route::currentRouteName() == 'categorii::list' ? 'class="active"' : ''; ?>><i class="fa fa-cubes" aria-hidden="true"></i> Categorii intrumente de lucru</a></li>
                                </ul>
                            </li>
                            {{-- 3, 9, 10,11, 12, 13, 14, 15, 21, 25, 26,32                                 --}}
                            <li class="has-sub" >
                                <a href="#"><i class="fa fa-wrench" aria-hidden="true"></i> Instrumente de lucru<span class="fa arrow"></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="{{ route('tipuri::list') }}"  <?php echo Route::currentRouteName() == 'tipuri::list' ? 'class="active"' : ''; ?>><i class="fa fa-industry" aria-hidden="true"></i> Tipuri</a></li>
                                    <li><a href="{{ route('moduri::list') }}"  <?php echo Route::currentRouteName() == 'moduri::list' ? 'class="active"' : ''; ?>><i class="fa fa-tasks" aria-hidden="true"></i> Moduri de realizare</a></li>
                                     <li><a href="{{ route('grade::list') }}"  <?php echo Route::currentRouteName() == 'grade::list' ? 'class="active"' : ''; ?>><i class="fa fa-percent" aria-hidden="true"></i> Grade de libetate</a></li>
                                    <li><a href="{{ route('nr_grade::list') }}"  <?php echo Route::currentRouteName() == 'nr_grade::list' ? 'class="active"' : ''; ?>><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Numar grade de libertate</a></li>
                                    <li><a href="{{ route('materiale::list') }}"  <?php echo Route::currentRouteName() == 'materiale::list' ? 'class="active"' : ''; ?>><i class="fa fa-diamond" aria-hidden="true"></i> Tipuri materiale</a></li>
                                    <li><a href="{{ route('categorii-complexe::list') }}"  <?php echo Route::currentRouteName() == 'categorii-complexe::list' ? 'class="active"' : ''; ?>><i class="fa fa-align-left" aria-hidden="true"></i> Categorii intrumente de lucru complexe</a></li>
                                    <li><a href="{{ route('alimentare::list') }}"  <?php echo Route::currentRouteName() == 'alimentare::list' ? 'class="active"' : ''; ?>><i class="fa fa-cutlery" aria-hidden="true"></i> Moduri alimentare il complexe</a></li>
                                    <li><a href="{{ route('evacuare::list') }}"  <?php echo Route::currentRouteName() == 'evacuare::list' ? 'class="active"' : ''; ?>><i class="fa fa-truck" aria-hidden="true"></i> Moduri evacuare componente rezultate</a></li>
                                    <li><a href="{{ route('consumabile::list') }}"  <?php echo Route::currentRouteName() == 'consumabile::list' ? 'class="active"' : ''; ?>><i class="fa fa-tint" aria-hidden="true"></i> Tipuri consumabile pentru il</a></li>

                                    <li><a href="{{ route('caracteristici::list') }}"  <?php echo Route::currentRouteName() == 'caracteristici::list' ? 'class="active"' : ''; ?>><i class="fa fa-server" aria-hidden="true"></i> Caracteristici tehnice relevante</a></li>
                                     <li><a href="{{ route('mod-aplicare::list') }}"  <?php echo Route::currentRouteName() == 'mod-aplicare::list' ? 'class="active"' : ''; ?>><i class="fa fa-sign-language" aria-hidden="true"></i> Moduri folosinta I.L.</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('componente::list') }}"  <?php echo Route::currentRouteName() == 'componente::list' ? 'class="active"' : ''; ?>><i class="fa fa-cogs" aria-hidden="true"></i> Componente rezultate</a></li> 
                            <li><a href="{{ route('zone::list') }}"  <?php echo Route::currentRouteName() == 'zone::list' ? 'class="active"' : ''; ?>><i class="fa fa fa-globe" aria-hidden="true"></i> Zone de lucru</a></li>

                            {{-- 18,19,20 --}}
                             <li class="has-sub" >
                                <a href="#"><i class="fa fa-list-ol" aria-hidden="true"></i> Materii prime cu care se aliumenteaza il<span class="fa arrow"></a>
                                <ul class="nav nav-third-level">
                                    <li><a href="{{ route('tipuri_materii::list') }}"  <?php echo Route::currentRouteName() == 'tipuri_materii::list' ? 'class="active"' : ''; ?>><i class="fa fa-align-center" aria-hidden="true"></i> Tipuri de materie</a></li>
                                     <li><a href="{{ route('forme_materii::list') }}"  <?php echo Route::currentRouteName() == 'forme_materii::list' ? 'class="active"' : ''; ?>><i class="fa fa-plus-square" aria-hidden="true"></i> Forma materiei</a></li>
                                    <li><a href="{{ route('caract_materii::list') }}"  <?php echo Route::currentRouteName() == 'caract_materii::list' ? 'class="active"' : ''; ?>><i class="fa fa-level-up" aria-hidden="true"></i> Caracteristici tehnice relevante</a></li>
                                </ul>
                            </li>

                             <li><a href="{{ route('tip-operatori::list') }}"  <?php echo Route::currentRouteName() == 'tip-operatori::list' ? 'class="active"' : ''; ?>><i class="fa fa-group" aria-hidden="true"></i> Operatori</a></li>

                           </ul>
                        </li>   
                       
                        {{-- 27 - - 32 --}}
                        <li class="has-sub">
                            <a href="#"><i class="fa fa-th" aria-hidden="true"></i> Date generale<span class="fa arrow"></a>   
                            <ul class="nav nav-second-level">  
                                <li><a href="{{ route('instalatii::list') }}"  <?php echo Route::currentRouteName() == 'instalatii::list' ? 'class="active"' : ''; ?>><i class="fa fa-building-o" aria-hidden="true"></i> Centralizatorul fabriciilor de productie</a></li>

                                
                                <li><a href="{{ route('operatori-necesari::list') }}"  <?php echo Route::currentRouteName() == 'operatori-necesari::list' ? 'class="active"' : ''; ?>><i class="fa fa-sort-numeric-asc" aria-hidden="true"></i> Numar operatori simultan necesari pentru functionare I.L.</a></li>   
                                 <li><a href="{{ route('schimburi-de-lucru::list') }}"  <?php echo Route::currentRouteName() == 'schimburi-de-lucru::list' ? 'class="active"' : ''; ?>><i class="fa fa-retweet" aria-hidden="true"></i> Numar de schimburi de lucru pe procesele de productie</a></li> 
                                 <li><a href="{{ route('ore-functionale::list') }}"  <?php echo Route::currentRouteName() == 'ore-functionale::list' ? 'class="active"' : ''; ?>><i class="fa fa-hourglass-start" aria-hidden="true"></i> Numar de ore nete functionale pe schimbul de lucru</a></li>
                                 <li><a href="{{ route('grad-incarcare::list') }}"  <?php echo Route::currentRouteName() == 'grad-incarcare::list' ? 'class="active"' : ''; ?>><i class="fa fa-percent" aria-hidden="true"></i> Gradul de incarcare orara a operatorilor de pe I.L. cand acesta functioneaza la capacitate maxima</a></li>
                                 <li><a href="{{ route('operatori-actuali::list') }}"  <?php echo Route::currentRouteName() == 'operatori-actuali::list' ? 'class="active"' : ''; ?>><i class="fa fa-mortar-board" aria-hidden="true"></i> Centralizatorul tipurilor de operatori actuali</a></li>
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
                                <li><a href="{{ route('il-posibile::list') }}"  <?php echo Route::currentRouteName() == 'il-posibile::list' ? 'class="active"' : ''; ?>><i class="fa fa-sort" aria-hidden="true"></i> Centralizatorul tuturor I.L. care sunt in patrimoniu sau custodie</a></li>        
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
			 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('page_heading')</h1>
                </div>
                <!-- /.col-lg-12 -->
           </div>
			<div class="row">  
				@yield('content')

            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>
@stop


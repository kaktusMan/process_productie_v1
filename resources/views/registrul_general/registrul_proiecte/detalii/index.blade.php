@extends('layouts.admin')

@section('title')

	  <h1 class="page-header">TO DO <a href="{{route('registrul-proiecte::list') }}" class="pull-right btn btn-default btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a></h1>
@stop

@section('head_scripts')

	{{--   --}}

@stop

@section('content')

<div class="row">
  <div class="col-lg-12">
    <ul class="nav nav-tabs">
      <li class="active">
        <a  href="#1" data-toggle="tab">Initierea proiectului</a>
      </li>
      <li><a href="#2" data-toggle="tab">Design-ul solutiilor</a>
      </li>
      <li><a href="#3" data-toggle="tab">Indicatori de monitorizare</a>
      <li><a href="#4" data-toggle="tab">Departamente suport necesare</a>
      <li><a href="#5" data-toggle="tab">Planificarea proiectului</a>
      <li><a href="#6" data-toggle="tab">Planificarea proiectului</a>
      <li><a href="#7" data-toggle="tab">Implementarea proiectului</a>
      </li>
    </ul>
    <div class="tab-content ">
        <div class="tab-pane active" id="1">
          <div class="row">
            <div class="col-lg-12">
              @include('registrul_general.registrul_proiecte.detalii.initierea_proiectului')
            </div>
          </div>
        </div>

        <div class="tab-pane" id="2">
              @include('registrul_general.registrul_proiecte.detalii.design_solutii')
        </div>
        <div class="tab-pane" id="3">
              @include('registrul_general.registrul_proiecte.detalii.indicatori_monitorizare')
        </div>
      </div>
  </div>
  </div>
 
@stop

@section('footer_scripts')
<script>
	 
	
	$(document).ready(function() {
		$('#test').DataTable({
			// responsive: true,
			"aoColumnDefs": [
                { 'bSortable': false, 'aTargets': [  ]}
            ],

		});

	});

			function openCity(evt, cityName) {
		    // Declare all variables
			    var i, tabcontent, tablinks;

			    // Get all elements with class="tabcontent" and hide them
			    tabcontent = document.getElementsByClassName("tabcontent");
			    for (i = 0; i < tabcontent.length; i++) {
			        tabcontent[i].style.display = "none";
			    }

			    // Get all elements with class="tablinks" and remove the class "active"
			    tablinks = document.getElementsByClassName("tablinks");
			    for (i = 0; i < tablinks.length; i++) {
			        tablinks[i].className = tablinks[i].className.replace(" active", "");
			    }

			    // Show the current tab, and add an "active" class to the link that opened the tab
			    document.getElementById(cityName).style.display = "block";
			    evt.currentTarget.className += " active";
			}


	

</script>	


@stop
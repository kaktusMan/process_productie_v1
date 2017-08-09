@extends('layouts.plane')

@section('title')
 <h2 class="page-header">Registrul concepte <a href="{{route('registrul-concepte::list') }}" class="pull-right btn btn-default btn-ms button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a></h2>
@stop

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-12">
                <!-- begin .flash-message -->
                @include('partials.flash_message')  
                <!-- end .flash-message -->
              </div>
            </div>        
            <div class="panel panel-default">
              <div class="panel-heading">
                  Detalii concept 
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="registrul_concepte">
                        <thead>
                          <tr>
                            <th class="text-center">Nr.</th>
                            <th class="text-center">Ideia inovatoare</th>
                            <th class="text-center">Formularea conceptului</th>
                            <th class="text-center">Avantajele aduse</th>
                            <th class="text-center">Infrastructura necesara</th>
                            <th class="text-center">Potentialii clienti</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th class="text-center">Nr.</th>
                            <th class="text-center">Ideia inovatoare</th>
                            <th class="text-center">Formularea conceptului</th>
                            <th class="text-center">Avantajele aduse</th>
                            <th class="text-center">Infrastructura necesara</th>
                            <th class="text-center">Potentialii clienti</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>                             
                          <tr data-id="{{ $concept->id }}"> 
                            <td class="text-center">{{ $concept->id }}</td>
                            <td class="text-center">{{ $concept->formare_concept }}</td>
                            <td class="text-center">{{ $concept->ideea_de_baza }}</td>
                            <td class="text-center">{{ $concept->avantajele_aduse }}</td>
                            <td class="text-center">{{ $concept->infrastructura }}</td>
                            <td class="text-center">{{ $concept->potentialii_clienti }}</td>

                            <td class="center action-buttons">
                              <a href="{{ route('registrul-concepte::edit-detalii',['id' =>$concept->id]) }}" alt="Editează" title="Adauga/Editează"><i class="fa fa-pencil-square-o" title="Editeaza"></i></a>
                            </td>                             
                          </tr>
                        </tbody>
                      </table>
                   </div>
                   <!-- /.table-responsive -->
               </div>
               <!-- /.panel-body -->
           </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row --> 
  @stop 
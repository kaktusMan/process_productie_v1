@extends('layouts.plane')

@section('title')
 <h2 class="page-header">Registrul de concepte bazate pe ideile propuse spre dezvoltare <a href="{{route('registrul-general::list') }}" class="pull-right btn btn-default btn-ms button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a></h2> 
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
                  Lista de concepte
                  <div class="pull-right">   
                    <a href="{{ route('registrul-concepte::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="registrul_concepte">
                        <thead>
                          <tr>
                            <th class="text-center">Nr.</th>
                            <th class="text-center">Data <br>introducerii <br> in registru</th>  
                            <th class="text-center">Segmenul catre<br> care se adreseaza</th>                   
                            <th class="text-center">Codul conceptului</th>
                            <th class="text-center">Dezvoltatorul conceptului</th>
                            <th class="text-center">Tipul de inovare conceptului</th>
                            <th class="text-center">Link de acces</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th class="text-center">Nr.</th>
                            <th class="text-center">Data <br>introducerii <br> in registru</th>  
                            <th class="text-center">Segmenul catre<br> care se adreseaza</th>                   
                            <th class="text-center">Codul conceptului</th>
                            <th class="text-center">Dezvoltatorul conceptului</th>
                            <th class="text-center">Tipul de inovare conceptului</th>
                            <th class="text-center">Link de acces</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>                             
                          @foreach ($concepte as $concept)
                            <tr data-id="{{ $concept->id }}"> 
                              <td class="text-center">{{ $concept->id }}</td>
                              <td class="text-center">{{ $concept->data_introducerii }}</td>
                              <td class="text-center">{{ $concept->segment_asociat }}</td>
                              <td class="text-center">{{ $concept->cod_concept }}</td>
                              <td class="text-center">{{ $concept->promotor_concept }}</td>
                              <td class="text-center">{{ $concept->tip_inovare }}</td>
                              <td class="text-center">
                                <a href="{{ route('registrul-concepte::detalii',['id' =>$concept->id]) }}" alt="Editează" title="Adauga detalii"></i>Apasa aici!</a> 
                              </td>

                              <td class="center action-buttons">
                                <a href="{{ route('registrul-concepte::edit',['id' =>$concept->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o" title="Editeaza"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $concept->id }}"><i class="fa fa-trash-o"></i></a>                           
                                        @include('partials.delete_modal', ['id' => $concept->id, 'item' => $concept->cod_concept, 'form_route'=> 'registrul-concepte::delete']) 
                              </td>                             
                            </tr>
                          @endforeach                             
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

@section('footer_scripts') 
    <script>
        $(document).ready(function() {          

             $('#registrul_concepte').dataTable({
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 7 ] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'}
            });            
              
            // $("#btn_show_hide").click(function(){
            //     $("#div_cautare").toggle();             
            // });   
            // var table = $('#registrul_concepte').dataTable().columnFilter({
            //   aoColumns: [ 
            //       { sSelector: "#_col_nume", type: "text" },
            //     ]
            // });
        });
    </script>
@stop
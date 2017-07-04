@extends('layouts.plane')

@section('title')
    Operatori actuali
@stop

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
              <div class="panel panel-primary">
                <div class="panel-heading">Zona de cautare
                    <a href="#" class="pull-right btn-primary" id="btn_show_hide" title="Afiseaza / Ascunde caracteristica_operator de cautare">
                        <i class="fa fa-list"></i>
                    </a>  
                </div>
                <div id="div_cautare" class="panel-body" style="display:none">
                    <table width="100%">
                        <tr>
                            <td width="25%">
                                <label class="control-label">Nume operator</label></td>
                            <td width="75%"><p id="_col_nume"></p></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <!-- begin .flash-message -->
                @include('partials.flash_message')  
                <!-- end .flash-message -->
              </div>
            </div>        
            <div class="panel panel-default">
              <div class="panel-heading">
                  Lista operatori actuali
                  <div class="pull-right">   
                    <a href="{{ route('operatori-actuali::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-operatori-actuali">
                        <thead>
                          <tr>                                   
                            <th class="text-center">Nume</th>
                            <th class="text-center">Nivel de performanta</th>
                            <th class="text-center">Varsta</th>
                            <th class="text-center">Data angajarii</th>
                            <th class="text-center">Salar brut</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>                                   
                            <th class="text-center">Nume</th>
                            <th class="text-center">Nivel de performanta</th>
                            <th class="text-center">Varsta</th>
                            <th class="text-center">Data angajarii</th>
                            <th class="text-center">Salar brut</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                         <tbody>
                                @foreach ($operatori as $operatie)
                                <tr>                                    
                                    <td class="text-center">{{ $operatie->nume }}</td>
                                    <td class="text-center">{{ @$operatie->nivel_performanta}}</td>
                                    <td class="text-center">{{ $operatie->varsta}}</td>
                                    <td class="text-center">{{ @$operatie->data_angajarii}}</td>
                                    <td class="text-center">{{ $operatie->salar_brut }} LEI</td>
                                    <td class="text-center actions">
                                        <a href="{{ route('operatori-actuali::edit',['id' =>$operatie->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o"></i>&nbsp;</a>
                                        <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $operatie->id }}"><i class="fa fa-trash-o"></i>&nbsp;</a>                           
                                        @include('partials.delete_modal', ['id' => $operatie->id, 'item' => $operatie->nume, 'form_route'=> 'operatori-actuali::delete'])                        
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

             $('#dataTables-operatori-actuali').dataTable({
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 2 ] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'}
            });            
              
            $("#btn_show_hide").click(function(){
                $("#div_cautare").toggle();             
            });   
            var table = $('#dataTables-operatori-actuali').dataTable().columnFilter({
              aoColumns: [ 
                  { sSelector: "#_col_nume", type: "text" },
                ]
            });
        });
    </script>
@stop
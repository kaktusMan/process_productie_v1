@extends('layouts.plane')

@section('title')
  Centralizatorul tuturor I.L. care sunt in patrimoniu sau custodie
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
                                <label class="control-label">Instrument de lucru</label></td>
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
                  Lista instrumente de lucru posibile
                  <div class="pull-right">   
                    <a href="{{ route('il-posibile::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-il-posibile">
                        <thead>
                          <tr>                                   
                            <th class="text-center">Nume</th>
                            <th class="text-center">Furnizor</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Mod folosinta</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>                                   
                            <th class="text-center">Nume</th>
                            <th class="text-center">Furnizor</th>
                            <th class="text-center">Marca</th>
                            <th class="text-center">Mod folosinta</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>                             
                          @foreach ($il_posibile as $il_posibil)
                            <tr data-id="{{ $il_posibil->id }}">         
                              <td class="text-center">{{ $il_posibil->nume }}</td>
                              <td class="text-center">{{ $il_posibil->furnizor }}</td>
                              <td class="text-center">{{ $il_posibil->marca }}</td>
                              <td class="text-center">{{ @$il_posibil->modFolosinta->nume }}</td>

                              <td class="center action-buttons">
                                <a href="{{ route('il-posibile::edit',['id' =>$il_posibil->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o" title="Editeaza"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $il_posibil->id }}"><i class="fa fa-trash-o"></i></a>                           
                                        @include('partials.delete_modal', ['id' => $il_posibil->id, 'item' => $il_posibil->nume, 'form_route'=> 'il-posibile::delete']) 
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

             $('#dataTables-il-posibile').dataTable({
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 3 ] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'}
            });            
              
            $("#btn_show_hide").click(function(){
                $("#div_cautare").toggle();             
            });   
            var table = $('#dataTables-il-posibile').dataTable().columnFilter({
              aoColumns: [ 
                  { sSelector: "#_col_nume", type: "text" },
                  { sSelector: "#_col_nume", type: "text" },
                  { sSelector: "#_col_nume", type: "text" },
                ]
            });
        });
    </script>
@stop
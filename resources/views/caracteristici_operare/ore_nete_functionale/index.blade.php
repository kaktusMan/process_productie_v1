@extends('layouts.plane')

@section('title')
    Orele nete functionale pe schimbul de lucru
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
                                <label class="control-label">Numarul de ore a operatorilor</label></td>
                            <td width="75%"><p id="_col_ore_nete_op"></p></td>
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
                  Lista numar  de orele nete functionale pe schimbul de lucru
                  <div class="pull-right">   
                    <a href="{{ route('ore-functionale::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-ore-functionale">
                        <thead>
                          <tr>                                   
                            <th class="text-center">Numarul de ore a operatorilor</th>
                            <th class="text-center">Numarul de ore a I.L</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>                                   
                            <th class="text-center">Numarul de ore a operatorilor</th>
                            <th class="text-center">Numarul de ore a I.L</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>                             
                          @foreach ($nr_ore as $index)
                            <tr data-id="{{ $index->id }}">         
                              <td class="text-center">{{ $index->ore_nete_op  }}</td>
                              <td class="text-center">{{ $index->ore_nete_il }}</td>
                              <td class="center action-buttons">
                                <a href="{{ route('ore-functionale::edit',['id' =>$index->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o" title="Editeaza"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $index->id }}"><i class="fa fa-trash-o"></i></a>                           
                                        @include('partials.delete_modal', ['id' => $index->id, 'item' => $index->nume, 'form_route'=> 'ore-functionale::delete']) 
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

             $('#dataTables-ore-functionale').dataTable({
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 2 ] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'}
            });            
              
            $("#btn_show_hide").click(function(){
                $("#div_cautare").toggle();             
            });   
            var table = $('#dataTables-ore-functionale').dataTable().columnFilter({
              aoColumns: [ 
                  { sSelector: "#_col_nume", type: "text" },
                ]
            });
        });
    </script>
@stop
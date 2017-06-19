@extends('layouts.plane')

@section('title')
  Nivele  
@stop

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
              <div class="panel panel-primary">
                <div class="panel-heading">Zona de cautare
                    <a href="#" class="pull-right btn-primary" id="btn_show_hide" title="Afiseaza / Ascunde zona de cautare">
                        <i class="fa fa-list"></i>
                    </a>  
                </div>
                <div id="div_cautare" class="panel-body" style="display:none">
                    <table width="100%">
                        <tr>
                            <td width="25%">
                                <label class="control-label">Nume nivel de grupare</label></td>
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
                  Lista nivele de grupare a actiunilor
                  <div class="pull-right">   
                    <a href="{{ route('nivele::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-nivel">
                        <thead>
                          <tr>                                   
                            <th class="text-center">Nume nivel</th>                   
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>                                   
                            <th class="text-center">Nume nivel</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>                             
                          @foreach ($nivele as $nivel)
                            <tr data-id="{{ $nivel->id }}">         
                              <td class="text-center">{{ $nivel->nume }}</td>
                              <td class="center action-buttons">
                                <a href="{{ route('nivele::edit',['id' =>$nivel->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o" title="Editeaza"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $nivel->id }}"><i class="fa fa-trash-o"></i></a>                           
                                        @include('partials.delete_modal', ['id' => $nivel->id, 'item' => $nivel->nume, 'form_route'=> 'nivele::delete']) 
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

             $('#dataTables-nivel').dataTable({
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 1 ] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'}
            });            
              
            $("#btn_show_hide").click(function(){
                $("#div_cautare").toggle();             
            });   
            var table = $('#dataTables-nivel').dataTable().columnFilter({
              aoColumns: [ 
                  { sSelector: "#_col_nume", type: "text" },
                ]
            });
        });
    </script>
@stop
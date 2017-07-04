@extends('layouts.plane')

@section('title')
    Grade de incarcare orara
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
                                <label class="control-label">Numar schimb</label></td>
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
                  Lista grade de incarcare orara a operatorilor
                  <div class="pull-right">   
                    <a href="{{ route('grad-incarcare::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-grad-incarcare">
                        <thead>
                          <tr>                                   
                            <th class="text-center">Operator</th>
                            <th class="text-center">Grad incarcare[%]</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>                                   
                            <th class="text-center">Operator</th>
                            <th class="text-center">Grad incarcare[%]</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>                             
                          @foreach ($grade as $grad)
                            <tr data-id="{{ $grad->id }}">     
                              <td>{{ @$grad->operatori->nume }}</td>
                              <td>{{ $grad->grad_de_incarcare }}</td>    
                              <td class="center action-buttons">
                                <a href="{{ route('grad-incarcare::edit',['id' =>$grad->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o" title="Editeaza"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $grad->id }}"><i class="fa fa-trash-o"></i></a>                           
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

             $('#dataTables-grad-incarcare').dataTable({
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 2 ] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'}
            });            
              
            $("#btn_show_hide").click(function(){
                $("#div_cautare").toggle();             
            });   
            var table = $('#dataTables-grad-incarcare').dataTable().columnFilter({
              aoColumns: [ 
                  { sSelector: "#_col_nume", type: "text" },
                ]
            });
        });
    </script>
@stop
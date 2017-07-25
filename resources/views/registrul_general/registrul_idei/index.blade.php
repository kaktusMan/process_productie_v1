@extends('layouts.plane')

@section('title')
  Registrul idei  
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
                                <label class="control-label">Cod idee</label></td>
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
                  Lista concepte
                  <div class="pull-right">   
                    <a href="{{ route('registrul-idei::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="registul_idei">
                        <thead>
                          <tr>   
                            <th class="text-center">Nr.</th>
                            <th class="text-center">Data <br>introducerii <br> in registru</th>  
                            <th class="text-center">Segmenul catre<br> care se adreseaza</th>                   
                            <th class="text-center">Codul ideii</th>
                            <th class="text-center">Promotorul ideii</th>
                            <th class="text-center">Tipul de inovare ideii</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr> 
                            <th class="text-center">Nr.</th>
                            <th class="text-center">Data <br>introducerii <br> in registru</th>  
                            <th class="text-center">Segmenul catre<br> care se adreseaza</th>                   
                            <th class="text-center">Codul ideii</th>
                            <th class="text-center">Promotorul ideii</th>
                            <th class="text-center">Tipul de inovare ideii</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>                             
                          @foreach ($idei as $ideie)
                            <tr data-id="{{ $ideie->id }}"> 
                              <td class="text-center">{{ $ideie->id }}</td>
                              <td class="text-center">{{ $ideie->data_introducerii }}</td>
                              <td class="text-center">{{ $ideie->segment_asociat }}</td>
                              <td class="text-center">{{ $ideie->cod_idee }}</td>
                              <td class="text-center">{{ $ideie->promotor_idee }}</td>
                              <td class="text-center">{{ $ideie->tip_inovare }}</td>
                              <td class="center action-buttons">
                                <a href="{{ route('registrul-idei::edit',['id' =>$ideie->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o" title="Editeaza"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $ideie->id }}"><i class="fa fa-trash-o"></i></a>                           
                                        @include('partials.delete_modal', ['id' => $ideie->id, 'item' => $ideie->cod_idee, 'form_route'=> 'registrul-idei::delete']) 
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

             $('#registul_idei').dataTable({
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 0 ] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'}
            });            
              
            // $("#btn_show_hide").click(function(){
            //     $("#div_cautare").toggle();             
            // });   
            // var table = $('#registul_idei').dataTable().columnFilter({
            //   aoColumns: [ 
            //       { sSelector: "#_col_nume", type: "text" },
            //     ]
            // });
        });
    </script>
@stop
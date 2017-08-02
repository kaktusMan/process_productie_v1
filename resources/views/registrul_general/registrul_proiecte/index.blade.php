@extends('layouts.plane')

@section('title')
  Registrul de proiecte de investitii inovatoare sau strategice  
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
                                <label class="control-label">Cod concept</label></td>
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
                  Lista proiecte
                  <div class="pull-right">   
                    <a href="{{ route('registrul-proiecte::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="registrul_proiecte">
                        <thead>
                          <tr>
                            <th class="text-center">Nr.</th>
                            <th class="text-center">Data <br>introducerii <br> in registru</th>  
                            <th class="text-center">Denumire proiect</th>                   
                            <th class="text-center">Codul proiectului</th>
                            <th class="text-center">Segmentul catre care se adreseaza</th>
                            <th class="text-center">Responsabil(board)</th>
                            <th class="text-center">Responsabil(executiv)</th>
                            <th class="text-center">Project manager</th>
                            <th class="text-center">Tipul de proiect</th>
                            <th class="text-center">Link de acces</th>
                            <th class="text-center">Validare pentru dezvoltare din partea comitetului DS</th>
                            <th class="text-center">Prioritarea de dezvoltare a proiectului</th>
                            <th class="text-center">Stadiul inceperii dezvoltarii proiectului</th>
                            <th class="text-center">Detalii despre proiect</th>
                            <th class="text-center">Business unit</th>
                            <th class="text-center">Societatea de care se implementeaza</th>
                            <th class="text-center">Termen de inceput</th>
                            <th class="text-center">Data pentru introducerea in teste estimata</th>
                            <th class="text-center">Data pentru introducerea in teste reala</th>
                            <th class="text-center">Data pentru introducerea in productie partiala estimata</th>
                            <th class="text-center">Data pentru introducerea in productie partiala reala</th>
                            <th class="text-center">Data pentru introducerea in productie completa estimata</th>
                            <th class="text-center">Data pentru introducerea in productie completa reala</th>
                            <th class="text-center">Buget estimat pentru dezvoltare/implementare</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th class="text-center">Nr.</th>
                            <th class="text-center">Data <br>introducerii <br> in registru</th>  
                            <th class="text-center">Denumire proiect</th>                   
                            <th class="text-center">Codul proiectului</th>
                            <th class="text-center">Segmentul catre care se adreseaza</th>
                            <th class="text-center">Responsabil(board)</th>
                            <th class="text-center">Responsabil(executiv)</th>
                            <th class="text-center">Project manager</th>
                            <th class="text-center">Tipul de proiect</th>
                            <th class="text-center">Link de acces</th>
                            <th class="text-center">Validare pentru dezvoltare din partea comitetului DS</th>
                            <th class="text-center">Prioritarea de dezvoltare a proiectului</th>
                            <th class="text-center">Stadiul inceperii dezvoltarii proiectului</th>
                            <th class="text-center">Detalii despre proiect</th>
                            <th class="text-center">Business unit</th>
                            <th class="text-center">Societatea de care se implementeaza</th>
                            <th class="text-center">Termen de inceput</th>
                            <th class="text-center">Data pentru introducerea in teste estimata</th>
                            <th class="text-center">Data pentru introducerea in teste reala</th>
                            <th class="text-center">Data pentru introducerea in productie partiala estimata</th>
                            <th class="text-center">Data pentru introducerea in productie partiala reala</th>
                            <th class="text-center">Data pentru introducerea in productie completa estimata</th>
                            <th class="text-center">Data pentru introducerea in productie completa reala</th>
                            <th class="text-center">Buget estimat pentru dezvoltare/implementare</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>                             
                          @foreach ($proiecte as $concept)
                            <tr data-id="{{ $concept->id }}"> 
                              <td class="text-center">{{ $concept->id }}</td>
                              <td class="text-center">{{ $concept->data_adaugarii }}</td>
                              <td class="text-center">{{ $concept->nume }}</td>
                              <td class="text-center">{{ $concept->cod }}</td>
                              <td class="text-center">{{ $concept->segment_adresare }}</td>
                              <td class="text-center">{{ $concept->board }}</td>
                              <td class="text-center">{{ $concept->executiv }}</td>
                              <td class="text-center">{{ $concept->p_m }}</td>
                              <td class="text-center">{{ $concept->tip_proiect }}</td>
                              <td class="text-center">
                                <a href="{{ route('registrul-proiecte::detalii',['id' =>$concept->id]) }}" alt="Editează" title="Adauga detalii"></i>Apasa aici!</a> 
                              </td>
                              <td class="text-center">{{ $concept->validare }}</td>
                              <td class="text-center">{{ $concept->prioritate }}</td>
                              <td class="text-center">{{ $concept->stadiu }}</td>
                              <td class="text-center">{{ $concept->detalii }}</td>
                              <td class="text-center">{{ $concept->business_unit }}</td>
                              <td class="text-center">{{ $concept->societate_implementatoare }}</td>
                              <td class="text-center">{{ $concept->termen_inceput }}</td>
                              <td class="text-center">{{ $concept->testare_estimata }}</td>
                              <td class="text-center">{{ $concept->testare_reala }}</td>
                              <td class="text-center">{{ $concept->intr_in_prod_partiala_estimata }}</td>
                              <td class="text-center">{{ $concept->intr_in_prod_partiala_reala }}</td>
                              <td class="text-center">{{ $concept->intr_in_prod_completa_estimata }}</td>
                              <td class="text-center">{{ $concept->intr_in_prod_completa_reala }}</td>
                              <td class="text-center">{{ $concept->buget_estimat }}</td>

                              <td class="center action-buttons">
                                <a href="{{ route('registrul-proiecte::edit',['id' =>$concept->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o" title="Editeaza"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $concept->id }}"><i class="fa fa-trash-o"></i></a>                           
                                        @include('partials.delete_modal', ['id' => $concept->id, 'item' => $concept->cod_concept, 'form_route'=> 'registrul-proiecte::delete']) 
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

             $('#registrul_proiecte').dataTable({
                scrollX:        true,
                  scrollCollapse: true,
                  paging:         false,
                  fixedColumns:   {
                      leftColumns: 3,
                      rightColumns: 1
                  },
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [ 0 ] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'
                  },
              
            });            
              
            // $("#btn_show_hide").click(function(){
            //     $("#div_cautare").toggle();             
            // });   
            // var table = $('#registrul_proiecte').dataTable().columnFilter({
            //   aoColumns: [ 
            //       { sSelector: "#_col_nume", type: "text" },
            //     ]
            // });
        });
    </script>
@stop
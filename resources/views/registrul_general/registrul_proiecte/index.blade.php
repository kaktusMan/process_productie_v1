@extends('layouts.plane')

@section('title')
   
  <h2 class="page-header">Registrul de proiecte de investitii inovatoare sau strategice <a href="{{route('registrul-general::list') }}" class="pull-right btn btn-default btn-ms button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a></h2> 
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
                  Lista de proiecte
                  <div class="pull-right">   
                    <a href="{{ route('proiecte::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
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
                          @foreach ($proiecte as $proiect)
                            <tr data-id="{{ $proiect->id }}"> 
                              <td class="text-center" style="vertical-align: inherit;">{{ $proiect->id }}</td>
                              <td class="text-center" style="vertical-align: inherit;">{{ $proiect->data_adaugarii }}</td>
                              <td class="text-center" style="vertical-align: inherit;">{{ $proiect->nume }}</td>
                              <td class="text-center">{{ $proiect->cod }}</td>
                              <td class="text-center">{{ $proiect->segment_adresare }}</td>
                              <td class="text-center">{{ $proiect->board }}</td>
                              <td class="text-center">{{ $proiect->executiv }}</td>
                              <td class="text-center">{{ $proiect->p_m }}</td>
                              <td class="text-center">{{ $proiect->tip_proiect }}</td>
                              <td class="text-center flux">
                                <a href="{{ route('proiecte::detalii',['id' =>$proiect->id]) }}" alt="Editează" title="Adauga detalii"></i>Apasa aici!</a> 
                              </td>
                              <td class="text-center">{{ $proiect->validare }}</td>
                              <td class="text-center">{{ $proiect->prioritate }}</td>
                              <td class="text-center">{{ $proiect->stadiu }}</td>
                              <td class="text-center">{{ $proiect->detalii }}</td>
                              <td class="text-center">{{ $proiect->business_unit }}</td>
                              <td class="text-center">{{ $proiect->societate_implementatoare }}</td>
                              <td class="text-center">{{ $proiect->termen_inceput }}</td>
                              <td class="text-center">{{ $proiect->testare_estimata }}</td>
                              <td class="text-center">{{ $proiect->testare_reala }}</td>
                              <td class="text-center">{{ $proiect->intr_in_prod_partiala_estimata }}</td>
                              <td class="text-center">{{ $proiect->intr_in_prod_partiala_reala }}</td>
                              <td class="text-center">{{ $proiect->intr_in_prod_completa_estimata }}</td>
                              <td class="text-center">{{ $proiect->intr_in_prod_completa_reala }}</td>
                              <td class="text-center">{{ $proiect->buget_estimat }}</td>

                              <td class="center action-buttons" style="vertical-align: inherit;">
                                <a href="{{ route('proiecte::edit',['id' =>$proiect->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o" title="Editeaza"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $proiect->id }}"><i class="fa fa-trash-o"></i></a>                           
                                        @include('partials.delete_modal', ['id' => $proiect->id, 'item' => $proiect->cod_proiect, 'form_route'=> 'proiecte::delete']) 
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
                    { 'bSortable': false, 'aTargets': [ 24 ] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'
                  },
              
            });   
        });
    </script>
@stop
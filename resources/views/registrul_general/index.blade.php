@extends('layouts.plane')

@section('title')
  Registrul general
@stop

@section('content')
 
  <div class="row">
        <div class="col-lg-12">
        <br>          
            <div class="panel panel-default">
              <div class="panel-heading">
                  Registrul general de Idei/Concepte/Proiecte
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover">
                        <thead>
                          <tr>        
                            <th class="text-center">Nr.</th>
                            <th class="text-center">Tipul de registru</th>
                            <th class="text-center">Link de <br>Acces</th>
                          </tr>
                        </thead>
                        {{-- <tfoot>
                          <tr>          
                            <th class="text-center">Nr</th>
                            <th class="text-center">Tipul de registru</th>
                            <th class="text-center">Link de <br>Acces</th>
                          </tr>
                        </tfoot> --}}
                        <tbody>                             
                            <tr>         
                              <td class="text-center">1</td>
                              <td class="text-center">Registrul de idei cu potential valoros</td>
                              <td class="center">
                                <a href="{{route('registrul-idei::list')}}" alt="idei" title="Registrul de idei.">Apasa aici!</a>
                              </td>                             
                            </tr>
                            <tr>         
                              <td class="text-center">2</td>
                              <td class="text-center">Registrul de concepte bazate pe ideile propuse spre dezvoltare</td>
                              <td class="center">
                                <a href="{{route('registrul-concepte::list')}}" alt="concepte" title="Registrul de concepte.">Apasa aici!</a>
                              </td>                             
                            </tr>
                            <tr>         
                              <td class="text-center">3</td>
                              <td class="text-center">Registrul de proiecte de investitii inovatoare sau strategice</td>
                              <td class="center">
                                <a href="{{route('registrul-proiecte::list')}}" alt="proiecte" title="Registrul de proiecte.">Apasa aici!</a>
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
 
@stop 
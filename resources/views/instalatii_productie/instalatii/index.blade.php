@extends('layouts.plane')

@section('title')
  Fabrici de productie
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
                  Lista fabricilor de productie(production plants)
                  <div class="pull-right">   
                    <a href="{{ route('instalatii::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="dataTables-instalatii">
                        <thead>
                          <tr>  
                            <th class="text-center">324234234</th>                                 
                            <th class="text-center">Nume</th>
                            <th class="text-center">Cod</th>
                            <th class="text-center">Detalii</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>   
                            <th class="text-center">324234234</th>                                 
                            <th class="text-center">Nume</th>
                            <th class="text-center">Cod</th>
                            <th class="text-center">Detalii</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>   
                          {{-- Fabrici de productie --}}
                          @foreach ($instalatii as $instalatie)
                            <tr data-id="{{ $instalatie->id }}"> 
                              <td class="text-center details-control">
                                  <i class="fa fa-plus-square"></i>
                              </td>        
                              <td class="text-center">{{ $instalatie->nume }}</td>
                              <td class="text-center">{{ $instalatie->cod}}</td>
                              <td class="text-center">{{ $instalatie->detalii }}</td>
                              <td class="center action-buttons">
                               {{ $instalatie->id }}
                              </td>  
                            </tr>
                            {{-- Fluxuri de lucru --}}
                            @foreach($fluxuri as $flux)
                            <tr> 
                              @if($flux->id_pp == $instalatie->id)
                                <td class="text-center details-control">
                                  <i class="fa fa-minus-square"></i>
                                </td>
                                <td class="text-center" style="background-color: red">{{$flux->nume}}</td>
                                <td class="text-center" style="background-color: red">{{$flux->cod}}</td>
                                <td class="text-center" style="background-color: red">{{$flux->detalii}}</td>
                                <td class="center action-buttons" style="background-color: red">{{$flux->id_pp}}</td>
                              @else
                              <td style="display: none;">{{ $flux->id = 0}}</td>
                              @endif
                              </tr>
                                {{-- Prp aferente --}}
                                @foreach($procese as $proces)
                                  <tr class="test123"> 
                                  @if($proces->id_fl == $flux->id)

                                    <td></td>
                                    <td class="text-center" style="background-color: green">{{$proces->nume}}</td>
                                    <td class="text-center" style="background-color: green">{{$proces->cod}}</td>
                                    <td class="text-center" style="background-color: green">{{$proces->detalii}}</td>
                                    <td class="text-center" style="background-color: green">{{$proces->id_fl}}</td>
                                  @endif
                                  </tr>
                                @endforeach
                            @endforeach
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

             $('#dataTables-instalatii').dataTable({
                "aoColumnDefs": [
                    { 'bSortable': false, 'aTargets': [0,4] }
                ],
                "language": {                
                    "url": '{{ URL::to("assets/js/plugins/dataTables/lang_json/romanian.json") }}'
                }
            });            
              
            // $("#btn_show_hide").click(function(){
            //     $("#div_cautare").toggle();             
            // });   
            // var table = $('#dataTables-instalatii').dataTable().columnFilter({
            //   aoColumns: [ 
            //       { sSelector: "#_col_nume", type: "text" },
            //     ]
            // });  



              // $(".test123").find(".text-center").hide();

              // Click handler on entire table
              // $("#dataTables-instalatii").on('click', '.details-control1', function(event) {


// ;              $('#dataTables-instalatii tr[data-id="'+2+'"]').slideToggle();
                    // No bubbling up
                  // event.stopPropagation();

                  // var $target = $(event.target);
                  // console.log($target.closest('[data-id]').data('id'));
                   

                  //   // Open and close the appropriate thing
                  // if ( $target.closest("td").attr("colspan") > 2 ) {
                  //     $target.slideUp();
                  // } else {
                  //     $target.closest("tr").next().find(".kkt").slideToggle();
                  // }                    
              // });



        });
    </script>
@stop
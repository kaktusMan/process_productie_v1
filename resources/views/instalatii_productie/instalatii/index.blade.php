@extends('layouts.plane')

@section('title')
  Fabrici de productie
@stop

@section('content')
    
    <div class="row">
        <div class="col-lg-12">
            {{--   <div class="panel panel-primary">
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
            </div> --}}
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
                            <th class="text-center"></th>                                 
                            <th class="text-center">Nume</th>
                            <th class="text-center">Cod</th>
                            <th class="text-center">Detalii</th>
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>   
                            <th class="text-center"></th>                                 
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
                              <td class="text-left details-control">
                                  <i class="fa fa-plus-square"></i>
                              </td>   
                              <td class="text-left">
                                  <span class="xedit-nume"
                                      id="nume"
                                      data-pk="{{ $instalatie->id }}"
                                      data-name="nume"
                                      data-url="{{ route('instalatii::x_editable_inst') }}">{{ $instalatie->nume }}                                      
                                  </span>
                              </td>
                               <td class="text-left">
                                  <span class="xedit-cod"
                                      id="cod"
                                      data-pk="{{ $instalatie->id }}"
                                      data-name="cod"
                                      data-url="{{ route('instalatii::x_editable_inst') }}">{{ $instalatie->cod }}                                      
                                  </span>
                              </td>
                               <td class="text-left">
                                  <span class="xedit-detalii"
                                      id="detalii"
                                      data-pk="{{ $instalatie->id }}"
                                      data-name="detalii"
                                      data-url="{{ route('instalatii::x_editable_inst') }}">{{ $instalatie->detalii }}                                      
                                  </span>
                              </td>     
                              <td class="center action-buttons">
                                <a href="{{ route('instalatii::edit',['id' =>$instalatie->id]) }}" alt="Editează" title="Editează"><i class="fa fa-pencil-square-o" title="Editeaza PrP"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $instalatie->id }}"><i class="fa fa-trash-o"></i></a>                           
                                  @include('partials.delete_modal', ['id' => $instalatie->id, 'item' => $instalatie->nume, 'form_route'=> 'instalatii::delete']) 
                              </td>  
                            </tr>
                            {{-- Fluxuri de lucru --}}
                            @foreach(@$instalatie->fl_aferente as $flux) 
                                <tr>
                                  <td class="text-center details-control">
                                    <i class="fa fa-minus-square"></i>
                                  </td>  
                                  <td class="text-center">
                                  <span class="xedit-nume"
                                          id="nume"
                                          data-pk="{{ $flux->id }}"
                                          data-name="nume"
                                          data-url="{{ route('instalatii::x_editable_fl') }}">{{ $flux->nume }}                                      
                                      </span>
                                  </td>
                                   <td class="text-center">
                                      <span class="xedit-cod"
                                          id="cod"
                                          data-pk="{{ $flux->id }}"
                                          data-name="cod"
                                          data-url="{{ route('instalatii::x_editable_fl') }}">{{ $flux->cod }}                                      
                                      </span>
                                  </td>
                                   <td class="text-center">
                                      <span class="xedit-detalii"
                                          id="detalii"
                                          data-pk="{{ $flux->id }}"
                                          data-name="detalii"
                                          data-url="{{ route('instalatii::x_editable_fl') }}">{{ $flux->detalii }}                                      
                                      </span>
                                  </td>       
                                  <td class="center action-buttons">
                                   {{ 'flux' }}
                                  </td>
                                </tr>
                              @foreach(@$flux->fl_prp as $proces)  
                                <tr>
                                  <td>
                                    <i style="display: none;" class="fa fa-minus-square"></i>
                                  </td> 
                                  <td class="text-right">
                                  <span class="xedit-nume"
                                          id="nume"
                                          data-pk="{{ $proces->id }}"
                                          data-name="nume"
                                          data-url="{{ route('instalatii::x_editable_pp') }}">{{ $proces->nume }}                                      
                                      </span>
                                  </td>
                                   <td class="text-right">
                                      <span class="xedit-cod"
                                          id="cod"
                                          data-pk="{{ $proces->id }}"
                                          data-name="cod"
                                          data-url="{{ route('instalatii::x_editable_pp') }}">{{ $proces->cod }}                                      
                                      </span>
                                  </td>
                                   <td class="text-right">
                                      <span class="xedit-detalii"
                                          id="detalii"
                                          data-pk="{{ $proces->id }}"
                                          data-name="detalii"
                                          data-url="{{ route('instalatii::x_editable_pp') }}">{{ $proces->detalii }}                                      
                                      </span>
                                  </td>        
                                  <td class="center action-buttons">
                                   {{ 'process' }}
                                  </td>
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
    <div id="_token" class="hidden" data-token="{{ csrf_token() }}"></div>
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
             $.fn.editable.defaults.params = function (params) {
                  params._token = $("#_token").data("token");
                  return params;
              };

              $('span.xedit-nume,span.xedit-cod,span.xedit-detalii').css('cursor','pointer').editable({              
                placement: 'left'
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
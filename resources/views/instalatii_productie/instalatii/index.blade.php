@extends('layouts.plane')

@section('title')
  Centralizatorul Fabricilor de Productie
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
                  Fabricile de prodictie: Fluxurile de lucru/Procesele de productie aferente
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
                              <td class="text-left details-control-instalatie">
                                  <i class="fa fa-minus-square" style="cursor: pointer;" title="Arată fluxurile de lucru."></i>
                              </td>   
                              <td class="text-center">
                                  <span class="xedit-nume"
                                      id="nume"
                                      data-pk="{{ $instalatie->id }}"
                                      data-name="nume"
                                      data-url="{{ route('instalatii::x_editable_inst') }}">{{ $instalatie->nume }}                                      
                                  </span>
                              </td>
                               <td class="text-center">
                                  <span class="xedit-cod"
                                      id="cod"
                                      data-pk="{{ $instalatie->id }}"
                                      data-name="cod"
                                      data-url="{{ route('instalatii::x_editable_inst') }}">{{ $instalatie->cod }}                                      
                                  </span>
                              </td>
                               <td class="text-center">
                                  <span class="xedit-detalii"
                                      id="detalii"
                                      data-pk="{{ $instalatie->id }}"
                                      data-name="detalii"
                                      data-url="{{ route('instalatii::x_editable_inst') }}">{{ $instalatie->detalii }}                                      
                                  </span>
                              </td>     
                              <td class="text-center action-buttons">
                                <a href="#"><i class="glyphicon glyphicon-plus" title="Creare flux de lucru"></i></a>
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $instalatie->id }}"><i class="fa fa-trash-o"></i></a>                           
                                  @include('partials.delete_modal', ['id' => $instalatie->id, 'item' => $instalatie->nume, 'form_route'=> 'instalatii::delete']) 
                              </td>  
                            </tr>
                            {{-- Fluxuri de lucru --}}
                            @foreach(@$instalatie->fl_aferente as $flux) 
                                <tr data-id="{{$flux->id}}" class="flux">
                                  <td class="text-center details-control-flux">
                                    <i class="fa fa-minus-square" style="cursor: pointer;" title="Ascunde procesele de productie."></i>
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
                                  <td class="text-center action-buttons">
                                    <a href="{{ route('instalatii::edit',['id' =>$instalatie->id]) }}" alt="Editează" title="Editează"><i class="glyphicon glyphicon-plus" title="Creare proces de productie"></i></a>
                                    <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $instalatie->id }}"><i class="fa fa-trash-o"></i></a>                           
                                      @include('partials.delete_modal', ['id' => $instalatie->id, 'item' => $instalatie->nume, 'form_route'=> 'instalatii::delete']) 
                                  </td>
                                </tr>
                              @foreach(@$flux->fl_prp as $proces)  
                                <tr data-id="{{$proces->id}}" class="proces">
                                  <td class="text-center details-control">
                                    <i style="display: none;" class="fa fa-minus-square"></i>
                                  </td> 
                                  <td class="text-center">
                                  <span class="xedit-nume"
                                          id="nume"
                                          data-pk="{{ $proces->id }}"
                                          data-name="nume"
                                          data-url="{{ route('instalatii::x_editable_pp') }}">{{ $proces->nume }}                                      
                                      </span>
                                  </td>
                                   <td class="text-center">
                                      <span class="xedit-cod"
                                          id="cod"
                                          data-pk="{{ $proces->id }}"
                                          data-name="cod"
                                          data-url="{{ route('instalatii::x_editable_pp') }}">{{ $proces->cod }}                                      
                                      </span>
                                  </td>
                                   <td class="text-center">
                                      <span class="xedit-detalii"
                                          id="detalii"
                                          data-pk="{{ $proces->id }}"
                                          data-name="detalii"
                                          data-url="{{ route('instalatii::x_editable_pp') }}">{{ $proces->detalii }}                                      
                                      </span>
                                  </td>        
                                  <td class="text-center action-buttons">
                                    <a href="{{ route('instalatii::edit',['id' =>$instalatie->id]) }}" alt="Editează" title="Editează"><i class="glyphicon glyphicon-plus" title="Creaza PrP"></i></a>
                                    <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $instalatie->id }}"><i class="fa fa-trash-o"></i></a>                           
                                      @include('partials.delete_modal', ['id' => $instalatie->id, 'item' => $instalatie->nume, 'form_route'=> 'instalatii::delete']) 
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
                      { 'bSortable': false, 'aTargets': [0,1,2,3,4] }
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
                placement: 'top'
              });       
              
            $("#btn_show_hide").click(function(){
                $("#div_cautare").toggle();             
            });   

// Bottom search ------------------------------------------------------------------------

            // var table = $('#dataTables-instalatii').dataTable().columnFilter({
            //   aoColumns: [ 
            //       { sSelector: "#_col_nume", type: "text" },
            //     ]
            // });  
// -------------------------------------------------------------------------------------


              // $(".test123").find(".text-center").hide();

              // Click handler on entire table
              // $("#dataTables-instalatii").on('click', '.details-control1', function(event) {


              // $('#dataTables-instalatii tr[data-id="'+2+'"]').slideToggle();
              //       No bubbling up
              //     event.stopPropagation();

              //     var $target = $(event.target);
              //     console.log($target.closest('[data-id]').data('id'));
                   

              //       // Open and close the appropriate thing
              //     if ( $target.closest("td").attr("colspan") > 2 ) {
              //         $target.slideUp();
              //     } else {
              //         $target.closest("tr").next().find(".kkt").slideToggle();
              //     }                    
              // });

              // $("#dataTables-instalatii").on('click', 'tbody tr #addRow', function() {





              // var table = $('#dataTables-instalatii').DataTable();
              //       var count = 1;
              //       var currentPage = table.page();
    
              //       //insert a test row
              //       count++;
              //       table.row.add([count, count, count, count, count]).draw();
                    
              //       //move added row to desired index (here the row we clicked on)
              //       var index = table.row(this).index(),
              //           rowCount = table.data().length-1,
              //           insertedRow = table.row(rowCount).data(),
              //           tempRow;

              //       for (var i=rowCount;i>index;i--) {
              //           tempRow = table.row(i-1).data();
              //           table.row(i).data(tempRow);
              //           table.row(i-1).data(insertedRow);
              //       }     
              //       //refresh the page
              //       table.page(currentPage).draw(false);

              // $(".flux").find(".text-center").hide();
              // $(".proces").find(".text-center").hide();

              $("#dataTables-instalatii").on('click', ".details-control-instalatie i", function(){

                // $("tr[data-id='" + $(this).closest('[data-id]').data('id') + "'].flux").find(".text-center").show();
                $("tr[data-id='" + $(this).closest('[data-id]').data('id') + "'].flux").css('color', 'red').slideToggle();


                $(this).toggleClass('fa-plus-square fa-minus-square');
              });

              $("#dataTables-instalatii").on('click', ".details-control-flux i", function(){ 
                  $("tr[data-id='" + $(this).closest('[data-id]').data('id') + "'].proces").css('color', 'green').slideToggle();
                
                $(this).toggleClass('fa-plus-square fa-minus-square');
                // $(this).toggleAttr('title', 'Arată procesele de productie.', 'Ascunde procesele de productie.');
              });

              $("#dataTables-instalatii").on('click', '.action-buttons a i', function(){
                $row_id = $(this).closest('[data-id]').data('id'); 

                  var table = $('#dataTables-instalatii').DataTable();
                    var count = 1;
                    var currentPage = table.page();
    
                    //insert a test row
                    count++;
                    table.row.add([count, count, count, count, count]).draw();
                    console.log(table.row(this));
                    //move added row to desired index (here the row we clicked on)
                    var index = table.row(this).index(),
                        rowCount = table.data().length-1,
                        insertedRow = table.row(rowCount).data(),
                        tempRow;

                    for (var i=rowCount;i>index;i--) {
                        tempRow = table.row(i-1).data();
                        table.row(i).data(tempRow);
                        table.row(i-1).data(insertedRow);
                    }     
                    //refresh the page
                    table.page(currentPage).draw(false);

              });

        });
    </script>
@stop
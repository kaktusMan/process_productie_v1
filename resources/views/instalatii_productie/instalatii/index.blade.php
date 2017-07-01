@extends('layouts.plane')

@section('title')
  Centralizatorul Fabricilor de Productie
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
                  Fabricile de prodictie: Fluxurile de lucru/Procesele de productie aferente
                  <div class="pull-right">   
                    <a href="{{ route('instalatii::create') }}" title="Creare fabrica de productie"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
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
                                  <i class="fa fa-chevron-circle-up" style="cursor: pointer;" title="Vizualizare fluxurile de lucru."></i>
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
                                
                               <div class="dropdown"> 




                                <a href="#"><i class="glyphicon glyphicon-plus" title="Creare flux de lucru"></i></a>
                                
                                <a href="#" alt="Sterge" title="Sterge" data-toggle="modal" data-target=".delete-modal-{{ $instalatie->id }}"><i class="fa fa-trash-o"></i></a>                           
                                  @include('partials.delete_modal', ['id' => $instalatie->id, 'item' => $instalatie->nume, 'form_route'=> 'instalatii::delete']) 



                              </td>  
                            </tr>
                            {{-- Fluxuri de lucru --}}
                            @foreach(@$instalatie->fl_aferente as $flux) 
                                <tr data-id="{{$flux->id}}" class="flux">
                                  <td class="text-center details-control-flux">
                                    <i class="fa fa-chevron-circle-down" style="cursor: pointer;" title="Ascunde procesele de productie."></i>
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

            $("#dataTables-instalatii").on('click', ".details-control-instalatie i", function(){
              $("tr[data-id='" + $(this).closest('[data-id]').data('id') + "'].flux").css('color', 'red').slideToggle();
              $(this).toggleClass('fa-chevron-circle-down fa-chevron-circle-up');
            });

            $("#dataTables-instalatii").on('click', ".details-control-flux i", function(){ 
              $("tr[data-id='" + $(this).closest('[data-id]').data('id') + "'].proces").css('color', 'green').slideToggle();
              $(this).toggleClass('fa-chevron-circle-down fa-chevron-circle-up');
            });

            $count = 0;
            $count1 = 0;

            $("#dataTables-instalatii").on('click', '.action-buttons a i', function(){

              $count = {{$instalatie->id}};
              $count++;
              $count1 = $count + $count1;

              var row_id = $(this).closest('[data-id]').data('id'); 
              var row_number = $(this).closest('tr').index();

              console.log($count1);

              $('<tr data-id='+row_id+'><td class="text-center details-control-instalatie"><i class="fa fa-chevron-circle-down" style="cursor: pointer;" title="Vizualizare fluxurile de lucru."></i></td> <td class="text-center"><a class="instalatie" href="#" data-name="nume" data-pk="'+$count1+'"></a></td><td class="text-center"><a class="instalatie" href="#" data-name="cod" data-pk="'+$count1+'"></a></td><td class="text-center"><a class="instalatie" href="#" data-name="detalii" data-pk="'+$count1+'"></a></td><td></td> </tr>').insertAfter($(this).closest('tr'));

              $('#dataTables-instalatii a.instalatie').editable({
              type: 'text',
              url: '{{ route('instalatii::x_editable_fl') }}' }); 

            });

        });
    </script>
@stop 
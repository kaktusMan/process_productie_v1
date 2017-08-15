<style>
	.editableform .form-control{
		width: 500px !important;
	} 
</style>
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
               		Initierea proiectului
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-bordered " id="registrul_proiecte_indicatori">
                     	<tr>
              	        <th style="vertical-align: inherit;width: 25%;">Data initierii 	proiectului:</th>
		                	    <td class="text-center">
                            <span style="width: 500px" class="xedit-data_initierii"
                              id="data_initierii"
                              data-type="date"
                              data-viewformat="yyyy-mm-dd"
                              data-pk="{{$proiect->id}}"
                              data-name="data_initierii"
                              data-url="{{ route('proiecte::x_edit_data_initierii') }}">{{$proiect->data_initierii}}    
                            </span>
                          </td>
			           	    </tr>
			                <tr>
			                  <th  style="vertical-align: inherit;" rowspan="45">Date generale care au determinat nevoia proiectului:</th>
			                  <td class="text-center"> 
			                     <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus date_generale" title="Adauga o noua data generala">COMPONENTA</i></a>
                        </td>
			                </tr>
			                @foreach(@$proiect->dateGenerale as $data_generala)
			                  <tr>
				                  <td class="text-center">
				            	      <span class="xedit-date_generale"
                              id="name" 
                              data-type="textarea"
                              data-pk="{{$proiect->id}}"
                              data-name="{{$data_generala->id}}"
                              data-url="{{ route('proiecte::x_edit_init_proiect') }}">{{$data_generala->nume}}
                            </span>
	                       	</td> 
                       	</tr>
                      @endforeach
                      <tr> <td style="display: none;">1</td></tr><td style="display: none;">2</td><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>
			                 
                      <tr>
                        <th  style="vertical-align: inherit;" rowspan="45">Obiectivele proiectului:</th>
                        <td class="text-center"> 
                          <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus obiective" title="Adauga un nou obiectiv">COMPONENTA</i></a>
                        </td>
                      </tr>
                      @foreach(@$proiect->obiective as $obiectiv)
                        <tr>
                          <td class="text-center">
                            <span class="xedit-obiective"
                              id="name" 
                              data-type="textarea"
                              data-pk="{{$proiect->id}}"
                              data-name="{{$obiectiv->id}}"
                              data-url="{{ route('proiecte::x_edit_init_proiect_obiective') }}">{{$obiectiv->nume}}
                            </span>
                          </td> 
                        </tr>
                      @endforeach
                      <tr> <td style="display: none;">1</td></tr><td style="display: none;">2</td><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>
			              
			               <tr>
                        <th  style="vertical-align: inherit;" rowspan="45">Constrangerile proiectului:</th>
                        <td class="text-center"> 
                          <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus constringeri" title="Adauga o noua constrangere">COMPONENTA</i></a>
                        </td>
                      </tr>
                      @foreach(@$proiect->constringeri as $constringere)
                        <tr>
                          <td class="text-center">
                            <span class="xedit-constringeri"
                              id="name" 
                              data-type="textarea"
                              data-pk="{{$proiect->id}}"
                              data-name="{{$constringere->id}}"
                              data-url="{{ route('proiecte::x_edit_init_proiect_constringeri') }}">{{$constringere->nume}}
                            </span>
                          </td> 
                        </tr>
                      @endforeach
                      <tr> <td style="display: none;">1</td></tr><td style="display: none;">2</td><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>

			            <tr>
			                <th>Scopul proiectului:</th>
			                <td class="text-center">
                            <span class="xedit-scop_proiect"
                              id="name" 
                              data-type="textarea"
                              data-pk="{{$proiect->id}}"
                              data-name="scop_proiect"
                              data-url="{{ route('proiecte::x_edit_init_proiect_scop_proiect') }}">{{$proiect->scop_proiect}}
                            </span>
                          </td>
			            </tr> 
                   <tr>
                        <th  style="vertical-align: inherit;" rowspan="45">Modalitatea de finantare a proiectului:</th>
                        <td class="text-center"> 
                          <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus finantari" title="Adauga un nou mod de finantare">COMPONENTA</i></a>
                        </td>
                      </tr>
                      @foreach(@$proiect->finantari as $finantare)
                        <tr>
                          <td class="text-center">
                            <span class="xedit-finantari"
                              id="name" 
                              data-type="textarea"
                              data-pk="{{$proiect->id}}"
                              data-name="{{$finantare->id}}"
                              data-url="{{ route('proiecte::x_edit_init_proiect_finantari') }}">{{$finantare->nume}}
                            </span>
                          </td> 
                        </tr>
                      @endforeach
                      <tr> <td style="display: none;">1</td></tr><td style="display: none;">2</td><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>
   
                      </table>
                   </div>
                   <!-- /.table-responsive -->
               </div>
               <!-- /.panel-body -->
           </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
<div id="_token" class="hidden" data-token="{!! csrf_token() !!}"></div>


@section('footer_scripts') 
<script>
$(document).ready(function() {  
	$.fn.editable.defaults.params = function (params) {
          params._token = $("#_token").data("token");
          return params;
    };

    $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content')
          }
    });

    pachete_lucru_detalii();


    $('span.xedit-data_initierii,span.xedit-date_generale, span.xedit-obiective,span.xedit-constringeri,span.xedit-scop_proiect, span.xedit-finantari,span.xedit-solutii,span.xedit-justificari_solutii,span.xedit-indicatori_monitorizare,span.xedit-departamente_suport, span.xedit-echipa, span.xedit-livrabile_proiect, span.xedit-procese_aferente, span.xedit-pachete_lucru,span.xedit-pachete_lucru_detalii ').css('cursor','pointer').editable({              
        placement: 'bottom',
     });

     $('span.xedit-procese_aferente').css('cursor','pointer').editable({
            type: 'select',
            placement: 'top',
            source: ['Aproba','Realizatorul','Consultant','Informat']
    });

    $(".date_generale ").on('click', function(){
    	 
          var row_id = $(this).closest('[data-id]').data('id');
          var row_number = $(this).closest('tr').index();

          $('<tr><td class="text-center details-control-date_generale"> <span  class="xedit-date_generale" id="name" data-type="textarea" data-pk="{{$proiect->id}}"data-name="name"data-url="{{ route('proiecte::x_edit_init_proiect') }}"111</span></td></tr>').insertAfter($(this).closest('tr'));
           $('span.xedit-date_generale').css('cursor','pointer').editable({              
              placement: 'bottom',
           });
	  });

    $(".obiective ").on('click', function(){
       
          var row_id = $(this).closest('[data-id]').data('id');
          var row_number = $(this).closest('tr').index();

          $('<tr><td class="text-center details-control-obiective"> <span  class="xedit-obiective" id="name" data-type="textarea" data-pk="{{$proiect->id}}"data-name="name"data-url="{{ route('proiecte::x_edit_init_proiect_obiective') }}"111</span></td></tr>').insertAfter($(this).closest('tr'));
           $('span.xedit-obiective').css('cursor','pointer').editable({              
              placement: 'bottom',
           });
    });

    $(".constringeri ").on('click', function(){
       
          var row_id = $(this).closest('[data-id]').data('id');
          var row_number = $(this).closest('tr').index();

          $('<tr><td class="text-center details-control-constringeri"> <span  class="xedit-constringeri" id="name" data-type="textarea" data-pk="{{$proiect->id}}"data-name="name"data-url="{{ route('proiecte::x_edit_init_proiect_constringeri') }}"111</span></td></tr>').insertAfter($(this).closest('tr'));
           $('span.xedit-constringeri').css('cursor','pointer').editable({              
              placement: 'bottom',
           });
    });
     $(".finantari ").on('click', function(){
       
          var row_id = $(this).closest('[data-id]').data('id');
          var row_number = $(this).closest('tr').index();

          $('<tr><td class="text-center details-control-finantari"> <span  class="xedit-finantari" id="name" data-type="textarea" data-pk="{{$proiect->id}}"data-name="name"data-url="{{ route('proiecte::x_edit_init_proiect_finantari') }}"111</span></td></tr>').insertAfter($(this).closest('tr'));
           $('span.xedit-finantari').css('cursor','pointer').editable({              
              placement: 'bottom',
           });
    });

    $(".solutii ").on('click', function(){
       
          var row_id = $(this).closest('[data-id]').data('id');
          var row_number = $(this).closest('tr').index();

          $('<tr><td class="text-center details-control-solutii"> <span  class="xedit-solutii" id="name" data-type="textarea" data-pk="{{$proiect->id}}"data-name="name"data-url="{{ route('proiecte::x_edit_init_proiect_solutii') }}"111</span></td></tr>').insertAfter($(this).closest('tr'));
           $('span.xedit-solutii').css('cursor','pointer').editable({              
              placement: 'bottom',
           });
    });

    $(".justificari_solutii").on('click', function(){
          $('<tr><td class="text-center details-control-justificari_solutii"> <span  class="xedit-justificari_solutii" id="name" data-type="textarea" data-pk="{{$proiect->id}}"data-name="name"data-url="{{ route('proiecte::x_edit_init_proiect_justificari_solutii') }}"111</span></td></tr>').insertAfter($(this).closest('tr'));
           $('span.xedit-justificari_solutii').css('cursor','pointer').editable({              
              placement: 'bottom',
           });
    }); 


            $count = 0;
            $count1 = 0;

             $(".indicatori_monitorizare").on('click', function(){
             // alert(1230);
              $count = {{$proiect->id}};
              $count1 = $count + $count1;

              $row_id = $(this).closest('[data-id]').data('id');
              $row_number = $(this).closest('tr').index();

              $test = makeid();
              console.log($test);

              $('<tr data-id='+$row_id+' class="indicatori_monitorizare" data-indicatori_monitorizare="'+$test+'"><td class="text-center"><a class="indicatori_monitorizare" href="#" data-name="nume" data-pk="'+$test+'" data-id="'+$test+'"></a></td><td class="text-center"><a class="indicatori_monitorizare" href="#" data-name="luna_1" data-pk="'+$test+'" data-id="'+$test+'"></a></td><td class="text-center"><a class="indicatori_monitorizare" href="#" data-name="luna_2" data-pk="'+$test+'" data-id="'+$test+'"></a></td><td class="text-center"><a class="indicatori_monitorizare" href="#" data-name="luna_3" data-pk="'+$test+'" data-id="'+$test+'"></a></td><td class="text-center"><a class="indicatori_monitorizare" href="#" data-name="luna_4" data-pk="'+$test+'" data-id="'+$test+'"></a></td><td class="text-center"><a class="indicatori_monitorizare" href="#" data-name="luna_5" data-pk="'+$test+'" data-id="'+$test+'"></a></td><td class="text-center"><a class="indicatori_monitorizare" href="#" data-name="luna_6" data-pk="'+$test+'" data-id="'+$test+'"></a></td></tr>').insertAfter($(this).closest('tr'));


              $('#indicatori_monitorizare_proiect a.indicatori_monitorizare').editable({
                type: 'text',
                id: $count1, 
                url: '{{ route('proiecte::x_edit_init_proiect_indicatori_monitorizare') }}',
                params: function(params) {   
                  // date[]
                  params['proiect_id'] = $count;

                  return params;                  
                }
              });  

            });


            $(".departamente_suport").on('click', function(){
             // alert(1230);
              $count = {{$proiect->id}};
              $count1 = $count + $count1;

              $row_id = $(this).closest('[data-id]').data('id');
              $row_number = $(this).closest('tr').index();

              $test = makeid();
              console.log($test);

              $('<tr data-id='+$row_id+' class="departamente_suport" data-departamente_suport="'+$test+'"><td class="text-center"><a class="departamente_suport" href="#" data-name="nume" data-pk="'+$test+'"></a></td><td class="text-center"><a class="departamente_suport" href="#" data-name="activitate" data-pk="'+$test+'"></a></td></tr>').insertAfter($(this).closest('tr'));


              $('#departament_suport_proiect a.departamente_suport').editable({
                type: 'text',
                id: $count1, 
                url: '{{ route('proiecte::x_edit_init_proiect_departamente_suport') }}',
                params: function(params) {   
                  // date[]
                  params['proiect_id'] = $count;

                  return params;                  
                }
              });  

            });




            


          $(".echipa ").on('click', function(){ 

              $('<tr><td class="text-center details-control-echipa"> <span  class="xedit-echipa" id="name" data-type="text" data-pk="{{$proiect->id}}"data-name="name"data-url="{{ route('proiecte::x_edit_init_proiect_echipa') }}"111</span></td></tr>').insertAfter($(this).closest('tr'));
               $('span.xedit-echipa').css('cursor','pointer').editable({              
                  placement: 'bottom',
               });
          });

           $(".add_livrabile_proiect").on('click', function(){
             // alert(1230);
              $count = {{$proiect->id}};
              $count1 = $count + $count1;

              $row_id = $(this).closest('[data-id]').data('id');
              $row_number = $(this).closest('tr').index();

              $test = makeid();
              console.log($test);

              $('<tr data-id='+$row_id+' class="livrabile_proiect" data-livrabile_proiect="'+$test+'"><td class="text-center"><a class="livrabile" href="#" data-type="text" data-name="nume" data-pk="'+$test+'"></a></td><td class="text-center"><a class="livrabile" href="#" data-type="date" data-viewformat="yyyy-mm-dd" data-name="termen_limita" data-pk="'+$test+'"></a></td></tr>').insertAfter($(this).closest('tr'));


              $('#livrabile_proiect a.livrabile').editable({
                // type: 'text',
                id: $count1, 
                url: '{{ route('proiecte::x_edit_init_proiect_livrabile_proiect') }}',
                params: function(params) {   
                  // date[]
                  params['proiect_id'] = $count;

                  return params;                  
                }
              });  

            });

            $(".add_procese_aferente").on('click', function(){
             // alert(1230);
              $count = {{$proiect->id}};
              $count1 = $count + $count1;

              $row_id = $(this).closest('[data-id]').data('id');
              $row_number = $(this).closest('tr').index();

              $test = makeid();
              console.log($test);

              $('<tr data-id='+$row_id+' class="procese_aferente" data-procese_aferente="'+$test+'"><td class="text-center"><a class="procese_aferente" href="#" data-type="text" data-name="nume" data-pk="'+$test+'"></a></td> <td class="text-center"><a class="procese_aferente_test" href="#" data-type="select" data-name="responsabil_board" data-pk="'+$test+'"></a></td><td class="text-center"><a class="procese_aferente_test" href="#" data-type="select" data-name="p_m" data-pk="'+$test+'"></a></td> <td class="text-center"><a class="procese_aferente_test" href="#" data-type="select" data-name="responsabil_directorat" data-pk="'+$test+'"></a></td><td class="text-center"><a class="procese_aferente_test" href="#" data-type="select" data-name="responsabil_proces" data-pk="'+$test+'"></a></td><td class="text-center"><a class="procese_aferente_test" href="#" data-type="select" data-name="responsabil_tehnic" data-pk="'+$test+'"></a></td><td class="text-center"><a class="procese_aferente_test" href="#" data-type="select" data-name="resp_tehn_implementare" data-pk="'+$test+'"></a></td></tr>').insertAfter($(this).closest('tr'));


               $('a.procese_aferente_test').css('cursor','pointer').editable({
                    type: 'select',
                    placement: 'top',
                    source: ['Aproba','Realizatorul','Consultant','Informat'],
                    id: $count1, 
                    url: '{{ route('proiecte::x_edit_init_proiect_procese_aferente') }}',
                    params: function(params) {   
                      // date[]
                      params['proiect_id'] = $count;

                      return params;                  
                    }
                });


                $('#procese_aferente a.procese_aferente').editable({
                  // type: 'textarea',
                  id: $count1, 
                  url: '{{ route('proiecte::x_edit_init_proiect_procese_aferente') }}',
                  params: function(params) {   
                    // date[]
                    params['proiect_id'] = $count;

                    return params;                  
                  }
                });  

            });

        $(".pachete_lucru").on('click', function(){
             // alert(1230);
              $count = {{$proiect->id}};
              $count1 = $count + $count1;

              $row_id = $(this).closest('[data-id]').data('id');
              $row_number = $(this).closest('tr').index();

              $test = makeid();
              console.log($test);

              $('<tr data-id='+$row_id+' class="pachete_lucru" data-pachete_lucru="'+$test+'"><td class="text-center"><a class="pachete_lucru" href="#" data-name="nume" data-pk="{{$proiect->id}}"></a></td><td class="text-center" colspan="5"><a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus pachete_lucru_detalii" title="Adauga o noua data generala">COMPONENTA</i></a></td></tr>').insertAfter($(this).closest('tr'));

              // pachete_lucru_detalii();

              $('#pachet_lucru a.pachete_lucru').editable({
                type: 'text',
                id: $count1, 
                url: '{{ route('proiecte::x_edit_init_pachete_de_lucru') }}',
                params: function(params) {   
                  // date[]
                  params['proiect_id'] = $count;

                  return params;                  
                }
              });  

            });

        function pachete_lucru_detalii(){
           $(".pachete_lucru_detalii").on('click', function(){

              $count = {{$proiect->id}};
                $count1 = $count + $count1;

                $row_id = $(this).closest('[data-id]').data('id');
                console.log($row_id);
                $row_number = $(this).closest('tr').index();

                $test = makeid();
                console.log($test);

                $('<tr data-id='+$row_id+' class="pachete_lucru_detalii" data-pachete_lucru_detalii="'+$test+'"><td class="text-center"><a class="pachete_lucru_detalii" href="#" data-type="text" data-name="actiune" data-pk="'+$test+'"></a></td><td class="text-center"><a class="pachete_lucru_detalii" href="#" data-type="text" data-name="responsabil" data-pk="'+$test+'"></a></td><td class="text-center"><a class="pachete_lucru_detalii" href="#" data-type="date" data-viewformat="yyyy-mm-dd" data-name="termen_limita" data-pk="'+$test+'"></a></td><td class="text-center"><a class="pachete_lucru_detalii" href="#" data-type="select" data-name="stadiu" data-pk="'+$test+'"></a></td><td class="text-center"><a class="pachete_lucru_detalii" href="#" data-type="text" data-name="observatii" data-pk="'+$test+'"></a></td></tr>').insertAfter($(this).closest('tr'));



                $('#pachet_lucru a.pachete_lucru_detalii').editable({
                 source: ['Finalizat','Neincaput','InLucru'],
                  id: $row_id, 
                  url: '{{ route('proiecte::x_edit_init_pachete_de_lucru_detalii') }}',
                  params: function(params) {   
                    // date[]
                    params['pachet_de_lucru_id'] = $row_id;

                    return params;                  
                  }
                }); 

           });  
        }
            
        $('span.xedit-procese_aferente').css('cursor','pointer').editable({
            type: 'select',
            placement: 'top',
            source: ['Aproba','Realizatorul','Consultant', 'Informat']
        });

         $('span.xedit-pachete_lucru_detalii').css('cursor','pointer').editable({
            type: 'select',
            placement: 'top',
            source: ['Finalizat','Neincaput','InLucru']
        });


          function makeid() {
                var text = "";
                var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

                for (var i = 0; i < 10; i++)
                  text += possible.charAt(Math.floor(Math.random() * possible.length));

                return text;
            }
});
</script>
@stop 
 



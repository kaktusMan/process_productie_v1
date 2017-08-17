@extends('layouts.plane')

@section('title')
  Centralizatorul produselor pe nivele
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
                  Grupe de produse: Familii de produse/Modele de produse aferente
                  <div class="pull-right">   
                    <a href="{{ route('nomenclator-lotus::create') }}" title="Creare grup de poroduse"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare Grup</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-striped table-bordered table-hover" id="nomenclator__lotus">
                        <thead>
                          <tr>  
                            <th class="text-center"></th>                                 
                            <th class="text-center">Nume</th> 
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>   
                            <th class="text-center"></th>                                 
                            <th class="text-center">Nume</th> 
                            <th class="text-center">Actiuni</th>
                          </tr>
                        </tfoot>
                        <tbody>   
                          {{-- Fabrici de productie --}}
                          @foreach ($grupe as $grup)
                            <tr data-id="{{ $grup->id }}" class="grup" data-grup="{{ $grup->id }}"> 
                              <td class="text-left details-control-grup">
                                  <i class="fa fa-chevron-circle-down" style="cursor: pointer;" title="Vizualizare fluxurile de lucru."></i>
                              </td>   
                              <td class="text-center">
                                  <span class="xedit-nume"
                                      data-id="nume"
                                      data-pk="{{ $grup->id }}"
                                      data-name="nume"
                                      data-url="{{ route('nomenclator-lotus::x_editable_grup') }}">{{ $grup->nume }}         
                                  </span>
                              </td>      
                              <td class="text-center action-buttons"> 

                                <a href="#"><i class="glyphicon glyphicon-plus grup" title="Creare flux de lucru"></i></a>
                                <a href="#"><i class="fa fa-trash-o delete-grup" title="Sterge"></i></a> 
                                 <a href="#"><i style="color: green;" class="fa fa-exchange" title="Analiza comparativa a reperelor din Ansamble pe Grupe de Produse"></i></a>                             
                              </td>  
                            </tr>
                            {{-- Fluxuri de lucru --}}
                            @foreach(@$grup->familii as $familie) 
                                <tr data-id="{{$grup->id}}" class="familie" data-familie={{$familie->id}}>
                                  <td class="text-center details-control-familie">
                                    <i class="fa fa-chevron-circle-down" style="cursor: pointer;" title="Ascunde procesele de productie."></i>
                                  </td>  
                                  <td class="text-center">
                                  <span class="xedit-nume"
                                          id="nume"
                                          data-pk="{{ $familie->id }}"
                                          data-name="nume"
                                          data-url="{{ route('nomenclator-lotus::x_editable_familie') }}">{{ $familie->nume }}                                      
                                      </span>
                                  </td>        
                                  <td class="text-center action-buttons">
                                        <a href="#"><i class="glyphicon glyphicon-plus familie" title="Create proces de productie."></i></a>
                                        <a href="#"><i class="fa fa-trash-o delete-familie" title="Sterge"></i></a>  
                                        <a href="#"><i style="color: green;" class="fa fa-exchange" title="Analiza comparativa a reperelor din Ansamble pe Familii de Produse"></i></a>   
                                  </td>
                                </tr>
                              @foreach(@$familie->modele as $model) 
                                <tr data-id="{{$familie->id}}" class="model" data-model={{$model->id}}>
                                  <td class="text-center details-control">
                                    <i style="display: none;" class="fa fa-minus-square"></i>
                                  </td> 
                                  <td class="text-center">
                                  <span class="xedit-nume"
                                          id="nume"
                                          data-pk="{{ $model->id }}"
                                          data-name="nume"
                                          data-url="{{ route('nomenclator-lotus::x_editable_model') }}">{{ $model->nume }}                                      
                                      </span>
                                  </td>  
                                  <td class="text-center action-buttons"> 
                                      <a href="#"><i class="fa fa-trash-o delete-model" title="Sterge"></i></a>  

                                      <a href="#"><i class="fa fa-table" title="Nomenclator de Ansambluri si Repere "></i></a>  


                                                              
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
    <div id="_token" class="hidden" data-token="{!! csrf_token() !!}"></div>
    <!-- /.row --> 
  @stop

@section('footer_scripts') 
  <script>
        $(document).ready(function() {          

              $('#nomenclator__lotus').dataTable({
                  "aoColumnDefs": [
                      { 'bSortable': false, 'aTargets': [0,1,2] }
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
              
            // $("#btn_show_hide").click(function(){
            //     $("#div_cautare").toggle();             
            // });   
 
            deleteModel();
            deleteFamilie();

            $("#nomenclator__lotus").on('click', ".details-control-grup i", function(){
              $("tr[data-id='" + $(this).closest('[data-id]').data('id') + "'].familie").slideToggle();
              $(this).toggleClass('fa-chevron-circle-down fa-chevron-circle-up');
            });

            $("#nomenclator__lotus").on('click', ".details-control-familie i", function(){ 
              $("tr[data-id='" + $(this).closest('[data-familie]').data('familie') + "'].model").slideToggle();

              $(this).toggleClass('fa-chevron-circle-down fa-chevron-circle-up');
            });

            $count = 0;
            $count1 = 0;

            $("#nomenclator__lotus").on('click', '.action-buttons a i.grup', function(){
             // alert(1230);
              $count = {{@$grup->id ? : 0}};
              $count1 = $count + $count1;

              var row_id = $(this).closest('[data-id]').data('id');
              var row_number = $(this).closest('tr').index();

              $('<tr data-id='+row_id+' class="familie" data-familie="'+$count1+'"><td class="text-center details-control-familie"><i class="fa fa-chevron-circle-down" style="cursor: pointer;" title="Vizualizare familiile de produse."></i></td> <td class="text-center"><a class="grup" href="#" data-name="nume" data-pk="'+$count1+'" data-id="'+row_id+'"></a><td class="text-center action-buttons"> <a href="#"><i class="glyphicon glyphicon-plus familie" title="Create model de productie."></i></a> <a href="#"><i class="fa fa-trash-o delete-familie" title="Sterge"></i></a>  </tr>').insertAfter($(this).closest('tr'));

              $.ajaxSetup({
                  headers: {
                      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                  }
              });

              $('#nomenclator__lotus a.grup').editable({
                type: 'text',
                id: row_id, 
                url: '{{ route('nomenclator-lotus::x_editable_familie') }}',
                params: function(params) {   
                  // date[]
                  params['grup_id'] = row_id;

                  return params;                  
                }
              });  
              deleteFamilie();

            });

            $count = 0;
            $count1 = 0;

             $("#nomenclator__lotus").on('click', '.action-buttons a i.familie', function(){

              $count = {{@$familie->id ? : 0}};
              $count1 = $count + $count1;

              var row_id = $(this).closest('[data-id]').data('familie');
              var row_number = $(this).closest('tr').index();
              console.log(row_id);
              $('<tr data-id='+row_id+' class="model" data-model="'+$count1+'" ><td></td> <td class="text-center"><a class="model" href="#" data-name="nume" data-pk="'+$count1+'" data-id="'+row_id+'"></a></td></td><td class="text-center action-buttons"><a href="#"><i class="fa fa-trash-o delete-model" title="Sterge"></i></a></td> </tr>').insertAfter($(this).closest('tr'));

              $.ajaxSetup({
                  headers: {
                      'X-CSRF-Token': $('meta[name="_token"]').attr('content')
                  }
              });

              $('#nomenclator__lotus a.model').editable({
                type: 'text',
                id: row_id, 
                url: '{{ route('nomenclator-lotus::x_editable_model') }}',
                params: function(params) {   
                  // date[]
                  params['familie_id'] = row_id;

                  return params;                  
                }
              });  
              deleteModel();

            });

            function deleteModel(){

                $('.delete-model').click(function(){
                  var url_delete = '{{ route('lotus-model::delete') }}'; 
                  var id = $(this).closest('tr').data('model'); 
                  bootbox.confirm({
                      title: "Sunteti sigur de stergerea inregistrarii?",
                      message: ' ',
                      buttons: {
                          'confirm': {
                              label: "Da, sterge!",
                              className: "btn-success"
                          },
                          'cancel': {
                              label: "Nu, renunta!",
                              className: "btn-danger"
                          }
                      },
                      callback: function(result){
                          if(result) {
                              $.ajax({
                                  type: "POST",
                                  url : url_delete,
                                  data : {
                                     "_token": $('meta[name="_token"]').attr('content'),
                                      "id": id
                                  },
                                  success : function(data){     
                                     if (data == "OK")
                                        $('tr[data-model='+id+']').fadeOut();
                                      else
                                        MessageBox("ERROR", "Stergere...", "Nu s-a putut sterge inregistrarea selectata!")
                                  }
                              });
                          }
                      }
                  });
                });
              }

              function deleteFamilie(){

                  $('.delete-familie').click(function(){
                  var url_delete = '{{ route('lotus-familie::delete') }}'; 
                  var id = $(this).closest('tr').data('familie');   
                  bootbox.confirm({
                      title: "Sunteti sigur de stergerea inregistrarii?",
                      message: ' ',
                      buttons: {
                          'confirm': {
                              label: "Da, sterge!",
                              className: "btn-success"
                          },
                          'cancel': {
                              label: "Nu, renunta!",
                              className: "btn-danger"
                          }
                      },
                      callback: function(result){
                          if(result) {
                              $.ajax({
                                  type: "POST",
                                  url : url_delete,
                                  data : {
                                     "_token": $('meta[name="_token"]').attr('content'),
                                      "id": id
                                  },
                                  success : function(data){     
                                     if (data == "OK")
                                        $('tr[data-familie='+id+']').fadeOut();
                                      else
                                        MessageBox("ERROR", "Stergere...", "Nu s-a putut sterge inregistrarea selectata!")
                                  }
                              });
                          }
                      }
                  });
                });
              }

              $('.delete-grup').click(function(){
                var url_delete = '{{ route('lotus-grup::delete') }}'; 
                var id = $(this).closest('tr').data('grup');     
                bootbox.confirm({
                    title: "Sunteti sigur de stergerea inregistrarii?",
                    message: ' ',
                    buttons: {
                        'confirm': {
                            label: "Da, sterge!",
                            className: "btn-success"
                        },
                        'cancel': {
                            label: "Nu, renunta!",
                            className: "btn-danger"
                        }
                    },
                    callback: function(result){
                        if(result) {
                            $.ajax({
                                type: "POST",
                                url : url_delete,
                                data : {
                                   "_token": $('meta[name="_token"]').attr('content'),
                                    "id": id
                                },
                                success : function(data){     
                                   if (data == "OK")
                                      $('tr[data-grup='+id+']').fadeOut();
                                    else
                                      MessageBox("ERROR", "Stergere...", "Nu s-a putut sterge inregistrarea selectata!")
                              }
                            });
                        }
                    }
                });
            });
      });
    </script>    
@stop 
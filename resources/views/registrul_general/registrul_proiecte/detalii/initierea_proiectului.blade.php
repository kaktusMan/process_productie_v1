 

<style>
	.editableform .form-control{
		width: 900px !important;
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
                      <table class="table table-bordered " id="registrul_proiecte">
                       	<tr>
		                	<th style="vertical-align: inherit;width: 20%;">Data initierii 	proiectului:</th>
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
			                <th class="text-center" style="vertical-align: inherit;" rowspan="45">Date generale care au determinat nevoia proiectului:</th>
			                <td class="text-center">
                              	  <span  class="xedit-name"
                                      id="name" 
                                      data-pk="{{$proiect->id}}"
                                      data-name="name"
                                      data-url="{{ route('proiecte::x_edit_init_proiect') }}">111                                      
                                  </span>
                                  <a href="#"><i class="glyphicon glyphicon-plus flux" title="Adauga o noua data generala"></i></a>
                              </td>
			               	
			            </tr>
			            <tr><td></td> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>
			            
			            <tr>
			                <th>Obiectivele proiectului:</th>
			                <td>data</td> 
			            </tr> 
			            <tr>
			                <th>Constingerile proiectului:</th>
			                <td>data</td> 
			            </tr>
			            <tr>
			                <th>Scopul proiectului:</th>
			                <td>data</td> 
			            </tr> 
			            <tr>
			                <th>Modalitatea de finantare a proiectului:</th>
			                <td>data</td> 
			            </tr> 
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
	console.log({{$proiect->id}});
	$.fn.editable.defaults.params = function (params) {
          params._token = $("#_token").data("token");
          return params;
    };

    $.ajaxSetup({
          headers: {
              'X-CSRF-Token': $('meta[name="_token"]').attr('content')
          }
    });

    $('span.xedit-data_initierii,span.xedit-name').css('cursor','pointer').editable({              
        placement: 'bottom',
     });

    $(".flux").on('click', function(){
    	 
          var row_id = $(this).closest('[data-id]').data('id');
          var row_number = $(this).closest('tr').index();

          $('<tr><td class="text-center details-control-flux"> <span  class="xedit-name"id="name" data-pk="{{$proiect->id}}"data-name="name"data-url="{{ route('proiecte::x_edit_init_proiect') }}"111</span></td></tr>').insertAfter($(this).closest('tr'));
           $('span.xedit-name').css('cursor','pointer').editable({              
        placement: 'bottom',
     });
	});

});
</script>
@stop 
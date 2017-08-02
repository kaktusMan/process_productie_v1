 

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
                  Lista proiecte
                  <div class="pull-right">   
                    <a href="{{ route('registrul-proiecte::create') }}"><i class="fa fa-plus-circle fa-fw" aria-hidden="true"></i>&nbsp; Creare</a>                   
                  </div>
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-bordered " id="registrul_proiecte">
                       	<tr>
		                	<th style="vertical-align: inherit;width: 20%;">Data initierii 	proiectului:</th>
		                	<td class="text-center">
                              <span style="width: 500px" class="xedit-nume"
                                      id="nume"
                                      data-type="date"
                                      data-viewformat="dd.mm.yyy"
                                      data-pk="1"
                                      data-name="nume"
                                      data-url="{{ route('registrul-proiecte::init_proiect') }}">gfg                                      
                                  </span>
                              </td>
			           	</tr>
			            <tr>
			                <th style="vertical-align: inherit;" rowspan="45">Date generale care au determinat nevoia proiectului:</th>
			                <td style="display: none;"></td>
			               	
			            </tr><td class="text-center">
                              	  <span  class="xedit-test"
                                      id="test" 
                                      data-pk="1"
                                      data-name="test"
                                      data-url="{{ route('registrul-proiecte::init_proiect') }}">gfg                                      
                                  </span>
                                  <a href="#"><i class="glyphicon glyphicon-plus flux" title="Create proces de productie."></i></a>
                              </td><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>
			            
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


@section('footer_scripts') 
    <script>
        $(document).ready(function() {  

    $('span.xedit-nume,span.xedit-test').css('cursor','pointer').editable({              
        placement: 'top',

      });
        $(".flux").on('click', function(){
              var row_id = $(this).closest('[data-id]').data('id');
              var row_number = $(this).closest('tr').index();

              $('<tr data-id='+row_id+' class="flux" data-flux="1"><td class="text-center details-control-flux"></td></tr>').insertAfter($(this).closest('tr'));

  });
  });



        </script>
@stop 
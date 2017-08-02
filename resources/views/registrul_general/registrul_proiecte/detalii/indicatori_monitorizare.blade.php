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
               </div>
               <div class="panel-body">
                   <div class="table-responsive">
                      <table class="table table-bordered " id="registrul_proiecte">
			                   <thead>
                           
                         </thead>
                         <tbody>
                           <tr>
                      <th style="vertical-align: inherit;" rowspan="45">Descrierea solutie:</th>
                      <td style="display: none;"></td>
                      </tr>
                        <td class="text-center">
                              <span  class="xedit-test"
                                  id="test" 
                                  data-pk="1"
                                  data-name="test"
                                  data-url="{{ route('registrul-proiecte::init_proiect') }}">gfg                                      
                              </span>
                              <a href="#"><i class="glyphicon glyphicon-plus flux" title="Create proces de productie."></i></a>
                        </td>
                            <tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>
                      
                      <tr>
                          <th style="vertical-align: inherit;" rowspan="45">Justificarea solutiei:</th>
                          <td style="display: none;"></td>
                      </tr>
                        <td class="text-center">
                                      <span  class="xedit-test"
                                          id="test" 
                                          data-pk="1"
                                          data-name="test"
                                          data-url="{{ route('registrul-proiecte::init_proiect') }}">gfg                                      
                                      </span>
                                      <a href="#"><i class="glyphicon glyphicon-plus flux" title="Create proces de productie."></i></a>
                                 </td>
                            <tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> 
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
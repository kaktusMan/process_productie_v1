<div class="row">
        <div class="col-lg-12">        
            <div class="panel panel-default">
              <div class="panel-heading">
               		Desing-ul solutiilor proiectului
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-bordered " id="registrul_proiecte">
			            <tr>	 
			                  <th  style="vertical-align: inherit;width: 25%;" rowspan="45">Descrierea solutiei:</th>
			                  <td class="text-center"> 
			                     <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus solutii" title="Adauga o noua solutie">COMPONENTA</i></a>
                        </td>
			                </tr>
			                @foreach(@$proiect->solutii as $solutie)
			                  <tr>
				                  <td class="text-center">
				            	      <span class="xedit-solutii"
                              id="name" 
                              data-type="textarea"
                              data-pk="{{$proiect->id}}"
                              data-name="{{$solutie->id}}"
                              data-url="{{ route('proiecte::x_edit_init_proiect_solutii') }}">{{$solutie->nume}}
                            </span>
	                       	</td> 
                       	</tr>
                      @endforeach
                      
                      <tr> <td style="display: none;">1</td></tr><td style="display: none;">2</td><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>
			                 
                      <tr>
                        <th  style="vertical-align: inherit;" rowspan="45">Justificarea solutiei:</th>
                        <td class="text-center"> 
                          <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus justificari_solutii" title="Adauga justificarea solutiilor">COMPONENTA</i></a>
                        </td>
                      </tr>
                      @foreach(@$proiect->justificariSolutii as $obiectiv)
                        <tr>
                          <td class="text-center">
                            <span class="xedit-justificari_solutii"
                              id="name" 
                              data-type="textarea"
                              data-pk="{{$proiect->id}}"
                              data-name="{{$obiectiv->id}}"
                              data-url="{{ route('proiecte::x_edit_init_proiect_justificari_solutii') }}">{{$obiectiv->nume}}
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
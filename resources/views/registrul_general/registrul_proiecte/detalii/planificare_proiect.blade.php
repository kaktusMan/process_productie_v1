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
               		Planificarea proiectului
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-bordered " >
			               <tr>	 
			                  <th  style="vertical-align: inherit;width: 25%;" rowspan="45">Echipa proiectului:</th>
			                  <td class="text-center"> 
			                     <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus echipa" title="Adauga o noua persoana">COMPONENTA</i></a>
                        </td>
			                </tr>
			                @foreach(@$proiect->echipaProiect as $echipa)
			                  <tr>
				                  <td class="text-center">
				            	      <span class="xedit-echipa"
                              id="nume" 
                              data-type="text"
                              data-pk="{{$proiect->id}}"
                              data-name="{{$echipa->id}}"
                              data-url="{{ route('proiecte::x_edit_init_proiect_echipa') }}">{{$echipa->nume}}
                            </span>
	                       	</td> 
                       	</tr>
                      @endforeach
                      <tr> <td style="display: none;">1</td></tr><td style="display: none;">2</td><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>
                  </table><br>
                
                  <table class="table table-bordered " id="livrabile_proiect">
			             <tr class="text-center">
                      <td style="border-left: 1px solid white; border-right: 1px solid white; border-top: 1px solid white;"></td>
                      <td style="border-left: 1px solid white; border-top: 1px solid white;"></td>
                      <td>Termen limita</td>
                    </tr>
                    <tr>   
                      <th  style="vertical-align: inherit;width: 25%;" rowspan="45">Livrabilele proiectului:</th>
                      <td class="text-center" colspan="3"> 
                        <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus add_livrabile_proiect" title="Adauga un nou livrabila">COMPONENTA</i></a>

                      </td>

                    </tr> 
                    @foreach(@$proiect->livrabileProiect as $livrabila)
                      <tr data-id="{{$proiect->id}}" class="livrabile_proiect" data-livrabile_proiect={{$livrabila->id}}>
                        <td class="text-center">
                          <span class="xedit-livrabile_proiect"
                            data-pk="{{$livrabila->str_indicator}}"
                            data-id="{{$livrabila->id}}"
                            data-name="nume"
                            data-url="{{ route('proiecte::x_edit_init_proiect_livrabile_proiect') }}">{{$livrabila->nume}}
                          </span> 
                        </td> 
                         
                        <td class="text-center">
                          <span class="xedit-livrabile_proiect"
                            data-pk="{{$livrabila->str_indicator}}" 
                            data-id="{{$livrabila->id}}"
                            data-name="termen_limita"
                            data-type="date"
                            data-viewformat="yyyy-mm-dd"
                            data-url="{{ route('proiecte::x_edit_init_proiect_livrabile_proiect') }}">{{$livrabila->termen_limita}}
                          </span>
                        </td>
                        </tr>
                      @endforeach
			               <tr> <td style="display: none;">1</td></tr><td style="display: none;">2</td><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>
                      </table><br>



                  <table class="table table-bordered " id="procese_aferente">
                   <tr class="text-center">
                      <td style="border-left: 1px solid white; border-top: 1px solid white;"></td>
                      <td>Procese aferente proiectului</td>
                      <td>Responsabil Board</td>
                      <td>Manger Proiect</td>
                      <td>Responsabil Directorat</td>
                      <td>Responsabil Proces Productie</td>
                      <td>Responsabil Tehnic</td>
                      <td>Resp. Teh. Implementare</td>
                    </tr>
                    <tr>   
                      <th  style="vertical-align: inherit;width: 25%;" rowspan="45">Matricea RACI aferenta proiectului:</th>
                      <td class="text-center" colspan="8"> 
                        <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus add_procese_aferente" title="Adauga un nou proces aferent proiectului">COMPONENTA</i></a>
                      </td>
                    </tr> 
                    @foreach(@$proiect->proceseAferenteProiectului as $proces)
                      <tr data-id="{{$proiect->id}}">
                        <td class="text-center">
                          <span class="xedit-procese_aferente"
                            data-pk="{{$proces->str_indicator}}"
                            data-id="{{$proces->id}}"
                            data-name="nume"
                            data-url="{{ route('proiecte::x_edit_init_proiect_procese_aferente') }}">{{$proces->nume}}
                          </span> 
                        </td> 
                         <td class="text-center">
                          <span class="xedit-procese_aferente"
                            data-pk="{{$proces->str_indicator}}" 
                            data-id="{{$proces->id}}"
                            data-name="responsabil_board"
                            data-type="select"
                            data-source= ["Aproba","Realizatorul","Consultant","Informat"]
                            
                            data-url="{{ route('proiecte::x_edit_init_proiect_procese_aferente') }}">{{$proces->responsabil_board}}
                          </span>
                        </td>
                         <td class="text-center">
                          <span class="xedit-procese_aferente"
                            data-pk="{{$proces->str_indicator}}" 
                            data-id="{{$proces->id}}"
                            data-name="p_m"
                            data-type="select"
                            data-source= ["Aproba","Realizatorul","Consultant","Informat"]
                            data-url="{{ route('proiecte::x_edit_init_proiect_procese_aferente') }}">{{$proces->p_m}}
                          </span>
                        </td> 
                        <td class="text-center">
                          <span class="xedit-procese_aferente"
                            data-pk="{{$proces->str_indicator}}" 
                            data-id="{{$proces->id}}"
                            data-name="responsabil_directorat"
                            data-type="select"
                            data-source= ["Aproba","Realizatorul","Consultant","Informat"]
                            data-url="{{ route('proiecte::x_edit_init_proiect_procese_aferente') }}">{{$proces->responsabil_directorat}}
                          </span>
                        </td> 
                        <td class="text-center">
                          <span class="xedit-procese_aferente"
                            data-pk="{{$proces->str_indicator}}" 
                            data-id="{{$proces->id}}"
                            data-name="responsabil_proces"
                            data-type="select"
                            data-source= ["Aproba","Realizatorul","Consultant","Informat"]
                            data-url="{{ route('proiecte::x_edit_init_proiect_procese_aferente') }}">{{$proces->responsabil_proces}}
                          </span>
                        </td> 
                        <td class="text-center">
                          <span class="xedit-procese_aferente"
                            data-pk="{{$proces->str_indicator}}" 
                            data-id="{{$proces->id}}"
                            data-name="responsabil_tehnic"
                            data-type="select"
                            data-source= ["Aproba","Realizatorul","Consultant","Informat"]
                            data-url="{{ route('proiecte::x_edit_init_proiect_procese_aferente') }}">{{$proces->responsabil_tehnic}}
                          </span>
                        </td> 
                        <td class="text-center">
                          <span class="xedit-procese_aferente"
                            data-pk="{{$proces->str_indicator}}" 
                            data-id="{{$proces->id}}"
                            data-name="resp_tehn_implementare"
                            data-type="select"
                            data-source= ["Aproba","Realizatorul","Consultant","Informat"]
                            data-url="{{ route('proiecte::x_edit_init_proiect_procese_aferente') }}">{{$proces->resp_tehn_implementare}}
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
 






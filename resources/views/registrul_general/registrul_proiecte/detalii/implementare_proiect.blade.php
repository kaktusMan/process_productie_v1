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
               		Implementarea proiectului:
               </div>
               <div class="panel-body">
                  <div class="table-responsive">
                    <table class="table table-bordered " id="pachet_lucru">
                    <tr>
                    	<th style="vertical-align: inherit; text-align: center;" >PACHETUL DE LUCRU(WORK PACKAGE - WP)</th>
                    	<th style="vertical-align: inherit; text-align: center;" >ACTIUNEA</th>
                    	<th style="vertical-align: inherit; text-align: center;" >RESPONSABIL</th>
                    	<th style="vertical-align: inherit; text-align: center;" >TERMEN LIMITA</th>
                    	<th style="vertical-align: inherit; text-align: center;" >STADIU</th>
                    	<th style="vertical-align: inherit; text-align: center;" >OBSERVATII</th>
                    </tr>

                     		<tr>
                     			<td class="text-center" colspan="6"> 
			                     <a href="#" style="color: red; font-size: 18px; " ><i style="font-weight: 700;" class="glyphicon glyphicon-plus pachete_lucru" title="Adauga un nou pachet de lucru">COMPONENTA</i></a>
			                     </td>
                     		</tr>


                      @foreach(@$proiect->pacheteDeLucru as $pachetLucru)
                      <tr data-id="{{$pachetLucru->id}}">
  			                 <th  style="vertical-align: inherit;" rowspan="45">
  				            	      <span class="xedit-pachete_lucru"
                                id="name" 
                                data-type="text"
                                data-pk="{{$proiect->id}}"
                                data-name="{{$proiect->id}}"
                                data-url="{{ route('proiecte::x_edit_init_pachete_de_lucru') }}">{{$pachetLucru->nume}}
                              </span>
  			                 </th>
  			                 <td class="text-center" colspan="5"> 
  			                     <a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus pachete_lucru_detalii" title="Adauga o noua data generala">COMPONENTA</i></a>
  	                        </td>
  			                </tr>
  			                @foreach(@$pachetLucru->detaliiPachet as $pachet)
  			                  <tr width="100%" data-id="{{$pachetLucru->id}}">
  				                 <td class="text-center">
  				            	      <span class="xedit-pachete_lucru_detalii"
  			                              data-pk="{{$pachet->str_indicator}}"
                                      data-id="{{$pachet->id}}"
                                      data-name="actiune"
  			                              data-url="{{ route('proiecte::x_edit_init_pachete_de_lucru_detalii') }}">{{$pachet->actiune}}
  			                            </span>
  	                       		</td> 
  	                       		<td class="text-center">
    				            	      <span class="xedit-pachete_lucru_detalii"
	                                    data-pk="{{$pachet->str_indicator}}"
                                      data-id="{{$pachet->id}}"
                                      data-name="responsabil"
  	                              data-url="{{ route('proiecte::x_edit_init_pachete_de_lucru_detalii') }}">{{$pachet->responsabil}}
                                </span>
  	                       		</td> 
  	                       		<td class="text-center">
  				            	      <span class="xedit-pachete_lucru_detalii"
                                      data-pk="{{$pachet->str_indicator}}"
                                      data-id="{{$pachet->id}}"
                                      data-name="termen_limita"
  			                              data-type="date"
                                      data-viewformat="yyyy-mm-dd" 
  			                              data-url="{{ route('proiecte::x_edit_init_pachete_de_lucru_detalii') }}">{{$pachet->termen_limita}}
  			                            </span>
  	                       		</td>  
  	                       		<td class="text-center">
  				            	      <span class="xedit-pachete_lucru_detalii"
  			                              data-type="select"
                                     data-source= ["Finalizat","Neinceput","Inlucru"]
  			                              data-pk="{{$pachet->str_indicator}}"
                                      data-id="{{$pachet->id}}"
                                      data-name="stadiu"
  			                              data-url="{{ route('proiecte::x_edit_init_pachete_de_lucru_detalii') }}">{{$pachet->stadiu}}
  			                            </span>
  	                       		</td> 
  	                       		<td class="text-center">
  				            	      <span class="xedit-pachete_lucru_detalii"
  			                              data-type="text"
  			                              data-pk="{{$pachet->str_indicator}}"
                                      data-id="{{$pachet->id}}"
                                      data-name="observatii"
  			                              data-url="{{ route('proiecte::x_edit_init_pachete_de_lucru_detalii') }}">{{$pachet->observatii}}
  			                            </span>
  	                       		</td> 
                         	</tr>
                         @endforeach

                        <tr> <td style="display: none;">1</td></tr><td style="display: none;">2</td><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr> </tr><tr>

                        @endforeach

                      </table>
                   </div>
                   <!-- /.table-responsive -->
               </div>
               <!-- /.panel-body -->
           </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>

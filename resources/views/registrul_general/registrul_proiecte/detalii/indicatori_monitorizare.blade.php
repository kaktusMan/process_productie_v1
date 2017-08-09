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
				Indicatori de monitorizare
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered " id="indicatori_monitorizare_proiect">
						<tr class="text-center">
							<td style="border-left: 1px solid white; border-top: 1px solid white;"></td>
							<td>Nume indicatori</td>
							<td>Luna 1</td>
							<td>Luna 2</td>
							<td>Luna 3</td>
							<td>Luna 4</td>
							<td>Luna 5</td>
							<td>Luna 6</td>
						</tr>
						<tr>	 
							<th  style="vertical-align: inherit;width: 25%;" rowspan="45">Indicatori de monitorizare a implementarii proiectului:</th>
							<td class="text-center" colspan="7"> 
								<a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus indicatori_monitorizare" title="Adauga un nou indicator">COMPONENTA</i></a>

							</td>

						</tr> 
						@foreach(@$proiect->indicatoriMonitorizare as $indicator)
							<tr data-id="{{$proiect->id}}" class="proces" data-proces={{$indicator->id}}>
								<td class="text-center">
									<span class="xedit-indicatori_monitorizare"
										data-pk="{{$indicator->str_indicator}}
										id="{{$indicator->id}}"
										data-name="nume"
										data-url="{{ route('proiecte::x_edit_init_proiect_indicatori_monitorizare') }}">{{$indicator->nume}}
									</span> 
								</td> 

								<td class="text-center">
									<span class="xedit-indicatori_monitorizare"
										data-pk="{{$indicator->str_indicator}}" 
										id="{{$indicator->id}}"
										data-name="luna_1"
										data-url="{{ route('proiecte::x_edit_init_proiect_indicatori_monitorizare') }}">{{$indicator->luna_1}}
									</span>
								</td>
								<td class="text-center">
									<span class="xedit-indicatori_monitorizare"
										data-pk="{{$indicator->str_indicator}}" 
										id="{{$indicator->id}}"
										data-name="luna_2"
										data-url="{{ route('proiecte::x_edit_init_proiect_indicatori_monitorizare') }}">{{$indicator->luna_2}}
									</span>
								</td>
								<td class="text-center">
									<span class="xedit-indicatori_monitorizare"
										data-pk="{{$indicator->str_indicator}}" 
										id="{{$indicator->id}}"
										data-name="luna_3"
										data-url="{{ route('proiecte::x_edit_init_proiect_indicatori_monitorizare') }}">{{$indicator->luna_3}}
									</span>
								</td>
								<td class="text-center">
									<span class="xedit-indicatori_monitorizare"
										data-pk="{{$indicator->str_indicator}}" 
										id="{{$indicator->id}}"
										data-name="luna_4"
										data-url="{{ route('proiecte::x_edit_init_proiect_indicatori_monitorizare') }}">{{$indicator->luna_4}}
									</span>
								</td>
								<td class="text-center">
									<span class="xedit-indicatori_monitorizare"
										data-pk="{{$indicator->str_indicator}}" 
										id="{{$indicator->id}}"
										data-name="luna_5"
										data-url="{{ route('proiecte::x_edit_init_proiect_indicatori_monitorizare') }}">{{$indicator->luna_5}}
									</span>
								</td>
								<td class="text-center">
									<span class="xedit-indicatori_monitorizare"
										data-pk="{{$indicator->str_indicator}}" 
										id="{{$indicator->id}}"
										data-name="luna_6"
										data-url="{{ route('proiecte::x_edit_init_proiect_indicatori_monitorizare') }}">{{$indicator->luna_6}}
									</span>
								</td>
							</tr>
						@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
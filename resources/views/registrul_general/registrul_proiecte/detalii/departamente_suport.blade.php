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
				Departamente suport necesare
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-bordered " id="departament_suport_proiect">
						<tr class="text-center">
							<td style="border-left: 1px solid white; border-top: 1px solid white;"></td>
							<td>Denumirea departamentului suport:</td>
							<td>Activitatile necesare de realizat de catre departamentele suport:</td>
						</tr>
						<tr>	 
							<th  style="vertical-align: inherit;width: 25%;" rowspan="45">Departamentele suport necesare si scopul lor pentru implementarea proiectului:</th>
							<td class="text-center" colspan="3"> 
								<a href="#" style="color: green; font-size: 18px;"><i class="glyphicon glyphicon-plus departamente_suport" title="Adauga un nou departament">COMPONENTA</i></a>

							</td>

						</tr> 
						@foreach(@$proiect->departamenteSuport as $departament)
							<tr data-id="{{$proiect->id}}" class="proces" data-proces={{$departament->id}}>
								<td class="text-center">
									<span class="xedit-departamente_suport"
										data-pk="{{$departament->str_indicator}}"
										data-id="{{$departament->id}}"
										data-name="nume"
										data-url="{{ route('proiecte::x_edit_init_proiect_departamente_suport') }}">{{$departament->nume}}
									</span> 
								</td> 

								<td class="text-center">
									<span class="xedit-departamente_suport"
										data-pk="{{$departament->str_indicator}}" 
										data-id="{{$departament->id}}"
										data-name="activitate"
										data-url="{{ route('proiecte::x_edit_init_proiect_departamente_suport') }}">{{$departament->activitate}}
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
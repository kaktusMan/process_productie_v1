<div class="row">
    <div class="col-md-12">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul style="list-style-type: none; padding: 0;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{ csrf_field() }}
    </div>
</div>
<div class="row">
	<div class="col-md-4">
		<div class="form-group {{ $errors->has('ideea_de_baza') ? ' has-error' : '' }}">
            <label>Formularea conceptului bazat pe ideea inovatoare propusa</label>
            <textarea class="form-control" rows="5" class="form-control" name="ideea_de_baza" id="ideea_de_baza" value="{{ old('ideea_de_baza') ? old('ideea_de_baza') : $concept->ideea_de_baza }}" placeholder="formularea conceptului">{{ old('ideea_de_baza') ? old('ideea_de_baza') : $concept->ideea_de_baza }}</textarea> 
            @if ($errors->has('ideea_de_baza'))
            <span class="help-block">
                <strong>{{ $errors->first('ideea_de_baza') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('avantajele_aduse') ? ' has-error' : '' }}">
            <label>Avantajele aduse din dezvoltarea conceptului</label>
            <textarea class="form-control" rows="5" class="form-control" name="avantajele_aduse" id="avantajele_aduse" value="{{ old('avantajele_aduse') ? old('avantajele_aduse') : $concept->avantajele_aduse }}" placeholder="avantaje aduse">{{ old('avantajele_aduse') ? old('avantajele_aduse') : $concept->avantajele_aduse }}</textarea> 
            @if ($errors->has('avantajele_aduse'))
            <span class="help-block">
                <strong>{{ $errors->first('avantajele_aduse') }}</strong>
            </span>
            @endif
        </div>
        	
	</div>	
	<div class="col-md-4">
		<div class="form-group {{ $errors->has('impact') ? ' has-error' : '' }}">
            <label>Impactul privind dezvoltarea holding-ului prin implementarea conceptului</label>
            <textarea class="form-control" rows="5" class="form-control" name="impact" id="impact" value="{{ old('impact') ? old('impact') : $concept->impact }}" placeholder="impact concept">{{ old('impact') ? old('impact') : $concept->impact }}</textarea> 
            @if ($errors->has('impact'))
            <span class="help-block">
                <strong>{{ $errors->first('impact') }}</strong>
            </span>
            @endif
        </div>
		<div class="form-group {{ $errors->has('particularitati_concept') ? ' has-error' : '' }}">
            <label>Particularitati ale conceptului</label>
            <textarea class="form-control" rows="5" class="form-control" name="particularitati_concept" id="particularitati_concept" value="{{ old('particularitati_concept') ? old('particularitati_concept') : $concept->particularitati_concept }}" placeholder="particularitati">{{ old('particularitati_concept') ? old('particularitati_concept') : $concept->particularitati_concept }}</textarea> 
            @if ($errors->has('detalii'))
            <span class="help-block">
                <strong>{{ $errors->first('detalii') }}</strong>
            </span>
            @endif
        </div> 
	</div>
	<div class="col-md-4">
		 <div class="form-group {{ $errors->has('infrastructura') ? ' has-error' : '' }}">
            <label>Infrastructura necesara pentru implementarea coceptului</label>
            <textarea class="form-control" rows="5" class="form-control" name="infrastructura" id="infrastructura" value="{{ old('infrastructura') ? old('infrastructura') : $concept->infrastructura }}" placeholder="infrastructura concept">{{ old('infrastructura') ? old('infrastructura') : $concept->infrastructura }}</textarea> 
            @if ($errors->has('infrastructura'))
            <span class="help-block">
                <strong>{{ $errors->first('infrastructura') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('estimare_buget') ? ' has-error' : '' }}">
            <label>Estimarea bugetului pentru implementarea conceptului</label>
            <textarea class="form-control" rows="5" class="form-control" name="estimare_buget" id="estimare_buget" value="{{ old('estimare_buget') ? old('estimare_buget') : $concept->estimare_buget }}" placeholder="estimare_buget concept">{{ old('estimare_buget') ? old('estimare_buget') : $concept->estimare_buget }}</textarea> 
            @if ($errors->has('estimare_buget'))
            <span class="help-block">
                <strong>{{ $errors->first('estimare_buget') }}</strong>
            </span>
            @endif
        </div>
	</div>
	
</div>

	<div class="form-group {{ $errors->has('potentialii_clienti') ? ' has-error' : '' }}">
	    <label>Potentialii clienti</label>
	    <textarea class="form-control" rows="2" class="form-control" name="potentialii_clienti" id="potentialii_clienti" value="{{ old('potentialii_clienti') ? old('potentialii_clienti') : $concept->potentialii_clienti }}" placeholder="clientii">{{ old('potentialii_clienti') ? old('potentialii_clienti') : $concept->potentialii_clienti }}</textarea> 
	    @if ($errors->has('potentialii_clienti'))
	    <span class="help-block">
	        <strong>{{ $errors->first('potentialii_clienti') }}</strong>
	    </span>
	    @endif
	</div>

</div>
<div>
    <div class="row col-lg-12 text-center">
        <button type="submit" class="btn btn-primary btn-lg button-width">
            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Salveaza
        </button> 
        <a href="{{ route('registrul-concepte::detalii',['id' =>$concept->id]) }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 

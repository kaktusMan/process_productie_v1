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
        <div class="form-group {{ $errors->has('data_adaugarii') ? ' has-error' : '' }}">
            <label>Data introducerii in registru</label>
            <input type="date" class="form-control validate[required]" name="data_adaugarii" id="data_adaugarii" value="{{ old('data_adaugarii') ? old('data_adaugarii') : $proiect->data_adaugarii }}">
            @if ($errors->has('data_adaugarii'))
            <span class="help-block">
                <strong>{{ $errors->first('data_adaugarii') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('nume') ? ' has-error' : '' }}">
            <label>Denumirea proiectului</label>
            <input type="text" class="form-control validate[required]" name="nume" id="nume" value="{{ old('nume') ? old('nume') : $proiect->nume }}" placeholder="nume proiect">
            @if ($errors->has('nume'))
            <span class="help-block">
                <strong>{{ $errors->first('nume') }}</strong>
            </span>
            @endif
        </div> 

        <div class="form-group {{ $errors->has('cod') ? ' has-error' : '' }}">
            <label>Codul proiectului</label>
            <input type="text" class="form-control validate[required]" name="cod" id="cod" value="{{ old('cod') ? old('cod') : $proiect->cod }}" placeholder="cod proiect">
            @if ($errors->has('cod'))
            <span class="help-block">
                <strong>{{ $errors->first('cod') }}</strong>
            </span>
            @endif
        </div>  
        <div class="form-group {{ $errors->has('segment_adresare') ? ' has-error' : '' }}">
            <label>Segmentul catre care se adreseaza</label>
            <select name="segment_adresare" id="segment_adresare"  class="form-control validate[required]" data-search="5">
                <option value=""> </option>
                @foreach ($segmente_de_asociere as $key => $option)
                <option <?php echo $key == $proiect->segment_adresare ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
                @endforeach
            </select>
            @if ($errors->has('segment_adresare'))
            <span class="help-block">
                <strong>{{ $errors->first('segment_adresare') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('board') ? ' has-error' : '' }}">
            <label>Responsabil board</label>
            <input type="text" class="form-control validate[required]" name="board" id="board" value="{{ old('board') ? old('board') : $proiect->board }}" placeholder="board">
            @if ($errors->has('board'))
            <span class="help-block">
                <strong>{{ $errors->first('board') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('executiv') ? ' has-error' : '' }}">
            <label>Responsabil executiv</label>
            <input type="text" class="form-control validate[required]" name="executiv" id="executiv" value="{{ old('executiv') ? old('executiv') : $proiect->executiv }}" placeholder="executiv">
            @if ($errors->has('executiv'))
            <span class="help-block">
                <strong>{{ $errors->first('executiv') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('p_m') ? ' has-error' : '' }}">
            <label>Project manager</label>
            <input type="text" class="form-control validate[required]" name="p_m" id="p_m" value="{{ old('p_m') ? old('p_m') : $proiect->p_m }}" placeholder="project menager">
            @if ($errors->has('p_m'))
            <span class="help-block">
                <strong>{{ $errors->first('p_m') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('tip_proiect') ? ' has-error' : '' }}">
            <label>Tipul de proiect</label>
            <select name="tip_proiect" id="tip_proiect"  class="form-control validate[required]" data-search="5">
                <option value=""> </option>
                @foreach ($tipuri_inovare as $key => $option)
                <option <?php echo $key == $proiect->tip_proiect ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
                @endforeach
            </select>
            @if ($errors->has('tip_proiect'))
            <span class="help-block">
                <strong>{{ $errors->first('tip_proiect') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('validare') ? ' has-error' : '' }}">
            <label>Validare pentru dezvoltare din partea comitetului DS</label>
            <select name="validare" id="validare"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($validare_pt_dezvoltare as $key1 => $val)
                <option <?php echo $val == $proiect->validare ? 'selected="selected"' : ''; ?> value="{{ $val }}">{{ $key1 }}</option>
                @endforeach
            </select>
            @if ($errors->has('validare'))
            <span class="help-block">
                <strong>{{ $errors->first('validare') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('prioritate') ? ' has-error' : '' }}">
            <label>Prioritatea de dezvoltare a proiectului</label>
            <select name="prioritate" id="prioritate"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($prioritate_de_dezvoltare as $index => $value)
                <option <?php echo $value == $proiect->prioritate ? 'selected="selected"' : ''; ?> value="{{ $value }}">{{ $index }}</option>
                @endforeach
            </select>
            @if ($errors->has('prioritate'))
            <span class="help-block">
                <strong>{{ $errors->first('prioritate') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('stadiu') ? ' has-error' : '' }}">
            <label>Stadiul inceperii dezvoltarii proiectului</label>
            <select name="stadiu" id="stadiu"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($stadiul_inceperii as $index => $value)
                <option <?php echo $value == $proiect->stadiu ? 'selected="selected"' : ''; ?> value="{{ $value }}">{{ $index }}</option>
                @endforeach
            </select>
            @if ($errors->has('stadiu'))
            <span class="help-block">
                <strong>{{ $errors->first('stadiu') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('detalii') ? ' has-error' : '' }}">
            <label>Detalii despre proiect</label>
            <textarea class="form-control" rows="5" class="form-control validate[required]" name="detalii" id="detalii" value="{{ old('detalii') ? old('detalii') : $proiect->detalii }}" placeholder="detalii proiect">{{ old('detalii') ? old('detalii') : $proiect->detalii }}</textarea>
            @if ($errors->has('detalii'))
            <span class="help-block">
                <strong>{{ $errors->first('detalii') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('business_unit') ? ' has-error' : '' }}">
            <label>Business unit</label>
            <input type="text" class="form-control validate[required]" name="business_unit" id="business_unit" value="{{ old('business_unit') ? old('business_unit') : $proiect->business_unit }}" placeholder="busines unit">
            @if ($errors->has('business_unit'))
            <span class="help-block">
                <strong>{{ $errors->first('business_unit') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('societate_implementatoare') ? ' has-error' : '' }}">
            <label>Societatea pe care se implementeaza</label>
            <input type="text" class="form-control validate[required]" name="societate_implementatoare" id="societate_implementatoare" value="{{ old('societate_implementatoare') ? old('societate_implementatoare') : $proiect->societate_implementatoare }}" placeholder="societatea pe care se implementeaza">
            @if ($errors->has('societate_implementatoare'))
            <span class="help-block">
                <strong>{{ $errors->first('societate_implementatoare') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('termen_inceput') ? ' has-error' : '' }}">
            <label>Termen de inceput</label>
            <input type="date" class="form-control validate[required]" name="termen_inceput" id="termen_inceput" value="{{ old('termen_inceput') ? old('termen_inceput') : $proiect->termen_inceput }}">
            @if ($errors->has('termen_inceput'))
            <span class="help-block">
                <strong>{{ $errors->first('termen_inceput') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('testare_estimata') ? ' has-error' : '' }}">
            <label>Data introducerii in teste(estimata)</label>
            <input type="date" class="form-control validate[required]" name="testare_estimata" id="testare_estimata" value="{{ old('testare_estimata') ? old('testare_estimata') : $proiect->testare_estimata }}">
            @if ($errors->has('testare_estimata'))
            <span class="help-block">
                <strong>{{ $errors->first('testare_estimata') }}</strong>
            </span>
            @endif
        </div>
         <div class="form-group {{ $errors->has('testare_reala') ? ' has-error' : '' }}">
            <label>Data introducerii in teste(reala)</label>
            <input type="date" class="form-control validate[required]" name="testare_reala" id="testare_reala" value="{{ old('testare_reala') ? old('testare_reala') : $proiect->testare_reala }}">
            @if ($errors->has('testare_reala'))
            <span class="help-block">
                <strong>{{ $errors->first('testare_reala') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('intr_in_prod_partiala_estimata') ? ' has-error' : '' }}">
            <label>Data introducerii in productie partiala(estimata)</label>
            <input type="date" class="form-control validate[required]" name="intr_in_prod_partiala_estimata" id="intr_in_prod_partiala_estimata" value="{{ old('intr_in_prod_partiala_estimata') ? old('intr_in_prod_partiala_estimata') : $proiect->intr_in_prod_partiala_estimata }}">
            @if ($errors->has('intr_in_prod_partiala_estimata'))
            <span class="help-block">
                <strong>{{ $errors->first('intr_in_prod_partiala_estimata') }}</strong>
            </span>
            @endif
        </div>
         <div class="form-group {{ $errors->has('intr_in_prod_partiala_reala') ? ' has-error' : '' }}">
            <label>Data introducerii in productie partiala(reala)</label>
            <input type="date" class="form-control validate[required]" name="intr_in_prod_partiala_reala" id="intr_in_prod_partiala_reala" value="{{ old('intr_in_prod_partiala_reala') ? old('intr_in_prod_partiala_reala') : $proiect->intr_in_prod_partiala_reala }}">
            @if ($errors->has('intr_in_prod_partiala_reala'))
            <span class="help-block">
                <strong>{{ $errors->first('intr_in_prod_partiala_reala') }}</strong>
            </span>
            @endif
        </div>
         <div class="form-group {{ $errors->has('intr_in_prod_completa_estimata') ? ' has-error' : '' }}">
            <label>Data introducerii in productie completa(estimata)</label>
            <input type="date" class="form-control validate[required]" name="intr_in_prod_completa_estimata" id="intr_in_prod_completa_estimata" value="{{ old('intr_in_prod_completa_estimata') ? old('intr_in_prod_completa_estimata') : $proiect->intr_in_prod_completa_estimata }}">
            @if ($errors->has('intr_in_prod_completa_estimata'))
            <span class="help-block">
                <strong>{{ $errors->first('intr_in_prod_completa_estimata') }}</strong>
            </span>
            @endif
        </div>
         <div class="form-group {{ $errors->has('intr_in_prod_completa_reala') ? ' has-error' : '' }}">
            <label>Data introducerii in productie completa(reala)</label>
            <input type="date" class="form-control validate[required]" name="intr_in_prod_completa_reala" id="intr_in_prod_completa_reala" value="{{ old('intr_in_prod_completa_reala') ? old('intr_in_prod_completa_reala') : $proiect->intr_in_prod_completa_reala }}">
            @if ($errors->has('intr_in_prod_completa_reala'))
            <span class="help-block">
                <strong>{{ $errors->first('intr_in_prod_completa_reala') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('buget_estimat') ? ' has-error' : '' }}">
            <label>Buget estimat pentru dezvoltare/implementare</label>
            <input type="text" class="form-control validate[required]" name="buget_estimat" id="buget_estimat" value="{{ old('buget_estimat') ? old('buget_estimat') : $proiect->buget_estimat }}">
            @if ($errors->has('buget_estimat'))
            <span class="help-block">
                <strong>{{ $errors->first('buget_estimat') }}</strong>
            </span>
            @endif
        </div>
    </div>
     
</div>
<div>
    <div class="row col-lg-12 text-center">
        <button type="submit" class="btn btn-primary btn-lg button-width">
            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Salveaza
        </button> 
        <a href="{{route('registrul-proiecte::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 

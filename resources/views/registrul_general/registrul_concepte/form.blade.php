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

        <div class="form-group {{ $errors->has('data_introducerii') ? ' has-error' : '' }}">
            <label>Data introducerii in registru</label>
            <input type="date" class="form-control validate[required]" name="data_introducerii" id="data_introducerii" value="{{ old('data_introducerii') ? old('data_introducerii') : $concept->data_introducerii }}">
            @if ($errors->has('data_introducerii'))
            <span class="help-block">
                <strong>{{ $errors->first('data_introducerii') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('segment_asociat') ? ' has-error' : '' }}">
            <label>Segmentul catre care se adreseaza</label>
            <select name="segment_asociat" id="segment_asociat"  class="form-control validate[required]" data-search="5">
                <option value=""> </option>
                @foreach ($segmente_de_asociere as $key => $option)
                <option <?php echo $key == $concept->segment_asociat ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
                @endforeach
            </select>
            @if ($errors->has('segment_asociat'))
            <span class="help-block">
                <strong>{{ $errors->first('segment_asociat') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('cod_concept') ? ' has-error' : '' }}">
            <label>Codul conceptului</label>
            <input type="text" class="form-control validate[required]" name="cod_concept" id="cod_concept" value="{{ old('cod_concept') ? old('cod_concept') : $concept->cod_concept }}" placeholder="cod concept">
            @if ($errors->has('cod_concept'))
            <span class="help-block">
                <strong>{{ $errors->first('cod_concept') }}</strong>
            </span>
            @endif
        </div> 
        <div class="form-group {{ $errors->has('formare_concept') ? ' has-error' : '' }}">
            <label>Formarea conceptului bazat pe ideea inovatoare propusa</label>
            <input type="text" class="form-control validate[required]" name="formare_concept" id="formare_concept" value="{{ old('formare_concept') ? old('formare_concept') : $concept->formare_concept }}" placeholder="formare concept">
            @if ($errors->has('formare_concept'))
            <span class="help-block">
                <strong>{{ $errors->first('formare_concept') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        
        <div class="form-group {{ $errors->has('promotor_concept') ? ' has-error' : '' }}">
            <label>Dezvoltatorul conceptului</label>
            <input type="text" class="form-control validate[required]" name="promotor_concept" id="promotor_concept" value="{{ old('promotor_concept') ? old('promotor_concept') : $concept->promotor_concept }}" placeholder="promotor concept">
            @if ($errors->has('promotor_concept'))
            <span class="help-block">
                <strong>{{ $errors->first('promotor_concept') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('tip_inovare') ? ' has-error' : '' }}">
            <label>Tipul de inovare</label>
            <select name="tip_inovare" id="tip_inovare"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($tipuri_inovare as $key => $option)
                <option <?php echo $key == $concept->tip_inovare ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
                @endforeach
            </select>
            @if ($errors->has('tip_inovare'))
            <span class="help-block">
                <strong>{{ $errors->first('tip_inovare') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
            <label>Validare pentru dezvoltare din partea comitetului DS</label>
            <select name="status" id="status"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($validare_pt_dezvoltare as $key1 => $val)
                <option <?php echo $val == $concept->status ? 'selected="selected"' : ''; ?> value="{{ $val }}">{{ $key1 }}</option>
                @endforeach
            </select>
            @if ($errors->has('status'))
            <span class="help-block">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
            @endif
        </div>
        
    </div>
    <div class="col-md-4">
        <div class="form-group {{ $errors->has('tip_prioritate') ? ' has-error' : '' }}">
            <label>Prioritatea de dezvoltare a conceptului</label>
            <select name="tip_prioritate" id="tip_prioritate"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($prioritate_de_dezvoltare as $index => $value)
                <option <?php echo $value == $concept->tip_prioritate ? 'selected="selected"' : ''; ?> value="{{ $value }}">{{ $index }}</option>
                @endforeach
            </select>
            @if ($errors->has('tip_prioritate'))
            <span class="help-block">
                <strong>{{ $errors->first('tip_prioritate') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('stadiu') ? ' has-error' : '' }}">
            <label>Stadiul inceperii dezvoltarii conceptului</label>
            <select name="stadiu" id="stadiu"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($stadiul_inceperii as $index => $value)
                <option <?php echo $value == $concept->stadiu ? 'selected="selected"' : ''; ?> value="{{ $value }}">{{ $index }}</option>
                @endforeach
            </select>
            @if ($errors->has('stadiu'))
            <span class="help-block">
                <strong>{{ $errors->first('stadiu') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('detalii') ? ' has-error' : '' }}">
            <label>Detalii despre concept</label>
            <input type="text" class="form-control validate[required]" name="detalii" id="detalii" value="{{ old('detalii') ? old('detalii') : $concept->detalii }}" placeholder="detalii concept">
            @if ($errors->has('detalii'))
            <span class="help-block">
                <strong>{{ $errors->first('detalii') }}</strong>
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
        <a href="{{route('registrul-concepte::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 

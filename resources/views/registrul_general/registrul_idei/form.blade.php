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
            <input type="date" class="form-control validate[required]" name="data_introducerii" id="data_introducerii" value="{{ old('data_introducerii') ? old('data_introducerii') : $ideie->data_introducerii }}">
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
                <option <?php echo $key == $ideie->segment_asociat ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
                @endforeach
            </select>
            @if ($errors->has('segment_asociat'))
            <span class="help-block">
                <strong>{{ $errors->first('segment_asociat') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('cod_idee') ? ' has-error' : '' }}">
            <label>Codul ideii</label>
            <input type="text" class="form-control validate[required]" name="cod_idee" id="cod_idee" value="{{ old('cod_idee') ? old('cod_idee') : $ideie->cod_idee }}" placeholder="cod idee">
            @if ($errors->has('cod_idee'))
            <span class="help-block">
                <strong>{{ $errors->first('cod_idee') }}</strong>
            </span>
            @endif
        </div> 
        <div class="form-group {{ $errors->has('formare_idee') ? ' has-error' : '' }}">
            <label>Formarea ideii de dezvoltare/Optimizare</label>
            <input type="text" class="form-control validate[required]" name="formare_idee" id="formare_idee" value="{{ old('formare_idee') ? old('formare_idee') : $ideie->formare_idee }}" placeholder="formare idee">
            @if ($errors->has('formare_idee'))
            <span class="help-block">
                <strong>{{ $errors->first('formare_idee') }}</strong>
            </span>
            @endif
        </div>
    </div>
    <div class="col-md-4">
        
        <div class="form-group {{ $errors->has('promotor_idee') ? ' has-error' : '' }}">
            <label>Promotorul ideii</label>
            <input type="text" class="form-control validate[required]" name="promotor_idee" id="promotor_idee" value="{{ old('promotor_idee') ? old('promotor_idee') : $ideie->promotor_idee }}" placeholder="promotor idee">
            @if ($errors->has('promotor_idee'))
            <span class="help-block">
                <strong>{{ $errors->first('promotor_idee') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('tip_inovare') ? ' has-error' : '' }}">
            <label>Tipul de inovare</label>
            <select name="tip_inovare" id="tip_inovare"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($tipuri_inovare as $key => $option)
                <option <?php echo $key == $ideie->tip_inovare ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
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
                <option <?php echo $val == $ideie->status ? 'selected="selected"' : ''; ?> value="{{ $val }}">{{ $key1 }}</option>
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
            <label>Prioritatea de dezvoltare a ideii</label>
            <select name="tip_prioritate" id="tip_prioritate"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($prioritate_de_dezvoltare as $index => $value)
                <option <?php echo $value == $ideie->tip_prioritate ? 'selected="selected"' : ''; ?> value="{{ $value }}">{{ $index }}</option>
                @endforeach
            </select>
            @if ($errors->has('tip_prioritate'))
            <span class="help-block">
                <strong>{{ $errors->first('tip_prioritate') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group {{ $errors->has('stadiu') ? ' has-error' : '' }}">
            <label>Stadiul inceperii dezvoltarii ideii</label>
            <select name="stadiu" id="stadiu"  class="form-control validate[required]" data-search="5">
                <option value=""></option>
                @foreach ($stadiul_inceperii as $index => $value)
                <option <?php echo $value == $ideie->stadiu ? 'selected="selected"' : ''; ?> value="{{ $value }}">{{ $index }}</option>
                @endforeach
            </select>
            @if ($errors->has('stadiu'))
            <span class="help-block">
                <strong>{{ $errors->first('stadiu') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('detalii') ? ' has-error' : '' }}">
            <label>Detalii despre ideea formulata</label>
            <input type="text" class="form-control validate[required]" name="detalii" id="detalii" value="{{ old('detalii') ? old('detalii') : $ideie->detalii }}" placeholder="detalii idee">
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
        <a href="{{route('registrul-idei::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 

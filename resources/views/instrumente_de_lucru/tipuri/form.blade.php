<div class="row">
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    {{ csrf_field() }}
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group {{ $errors->has('nume') ? ' has-error' : '' }}">
                <label class="form-group {{ $errors->has('nume') ? 'help-block' : '' }}">Nume tip</label>
                <input type="text" class="form-control validate[required]" name="nume" id="nume" value="{{ old('nume') ? old('nume') : $tip->nume }}" placeholder="Nume tip instrument de lucru">
                @if ($errors->has('nume'))
                <span class="help-block">
                    <strong>{{ $errors->first('nume') }}</strong>
                </span>
                @endif              
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('id_niv_grupare') ? ' has-error' : '' }}">
                <label class="form-group {{ $errors->has('id_niv_grupare') ? 'help-block' : '' }}">Nivele de grupare a actiunilor</label>
                <select name="id_niv_grupare" id="id_niv_grupare"  class="form-control" data-search="5" tabindex="8">
                    <option value="">Setare nivel grupare</option>
                    @foreach ($nivele_grupare as $key1 => $val)
                    <option <?php echo $key1 == $tip->id_niv_grupare ? 'selected="selected"' : ''; ?> value="{{ $key1 }}">{{ $val }}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_niv_grupare'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_niv_grupare') }}</strong>
                </span>
                @endif
            </div>
        </div> 
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('id_modalit_realiz') ? ' has-error' : '' }}">
                <label class="form-group {{ $errors->has('id_modalit_realiz') ? 'help-block' : '' }}">Modalitate de realizare</label>
                <select name="id_modalit_realiz" id="id_modalit_realiz"  class="form-control" data-search="5" tabindex="8">
                    <option value="">Setare Modalitate</option>
                    @foreach ($modalitati_realiz as $key1 => $val)
                    <option <?php echo $key1 == $tip->id_modalit_realiz ? 'selected="selected"' : ''; ?> value="{{ $key1 }}">{{ $val }}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_modalit_realiz'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_modalit_realiz') }}</strong>
                </span>
                @endif
            </div>
        </div>
    </div>
    <div class="row col-lg-12 text-center">
        <button type="submit" class="btn btn-primary btn-lg button-width">
            <i class="fa fa-plus" aria-hidden="true"></i> &nbsp;Salveaza
        </button> 
        <a href="{{route('tipuri::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div>
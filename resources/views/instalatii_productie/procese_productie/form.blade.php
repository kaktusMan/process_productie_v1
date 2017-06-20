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
        <div class="col-md-6">
            <div class="form-group {{ $errors->has('nume') ? ' has-error' : '' }}">
               <label class="form-group {{ $errors->has('nume') ? 'help-block' : '' }}">Nume proces </label>
                <input type="text" class="form-control validate[required]" name="nume" id="nume" value="{{ old('nume') ? old('nume') : $proces->nume }}" placeholder="nume">
                @if ($errors->has('nume'))
                <span class="help-block">
                    <strong>{{ $errors->first('nume') }}</strong>
                </span>
                @endif              
            </div>
            <div class="form-group {{ $errors->has('cod') ? ' has-error' : '' }}">
               <label class="form-group {{ $errors->has('cod') ? 'help-block' : '' }}">Cod proces</label>
                <input type="text" class="form-control validate[required]" name="cod" id="cod" value="{{ old('cod') ? old('cod') : $proces->cod }}" placeholder="cod">
                @if ($errors->has('cod'))
                <span class="help-block">
                    <strong>{{ $errors->first('cod') }}</strong>
                </span>
                @endif              
            </div>
        </div>
        <div class="col-md-6">
             <div class="form-group {{ $errors->has('detalii') ? ' has-error' : '' }}">
               <label class="form-group {{ $errors->has('detalii') ? 'help-block' : '' }}">Detalii</label> 
                <input type="area" class="form-control validate[required]" name="detalii" id="detalii" value="{{ old('detalii') ? old('detalii') : $proces->detalii }}" placeholder="detalii">
                @if ($errors->has('detalii'))
                <span class="help-block">
                    <strong>{{ $errors->first('detalii') }}</strong>
                </span>
                @endif              
            </div>
            <div class="form-group {{ $errors->has('id_fl') ? ' has-error' : '' }}">
               <label class="form-group {{ $errors->has('id_fl') ? 'help-block' : '' }}">Fluxurile de lucru ale pp existente</label>
                <select name="id_fl" id="id_fl"  class="form-control validate[required]" data-search="5">
                    <option value="">Setare flux de lucru</option>
                    @foreach ($tipuri_fluxuri as $index => $value)
                    <option <?php echo $index == $proces->id_fl ? 'selected="selected"' : ''; ?> value="{{ $index }}">{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_fl'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_fl') }}</strong>
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
        <a href="{{route('fluxuri-pp::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div>






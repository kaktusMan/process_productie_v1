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
            <label class="form-group {{ $errors->has('nume') ? 'help-block' : '' }}">Nume</label>
            <input type="text" class="form-control validate[required]" name="nume" id="nume" value="{{ old('nume') ? old('nume') : $il_posibil->nume }}" placeholder="nume">
            @if ($errors->has('nume'))
            <span class="help-block">
                <strong>{{ $errors->first('nume') }}</strong>
            </span>
            @endif              
        </div>
        <div class="form-group {{ $errors->has('furnizor') ? ' has-error' : '' }}">
            <label class="form-group {{ $errors->has('furnizor') ? 'help-block' : '' }}">Furnizor</label>
            <input type="text" class="form-control validate[required]" name="furnizor" id="furnizor" value="{{ old('furnizor') ? old('furnizor') : $il_posibil->furnizor }}" placeholder="furnizor">
            @if ($errors->has('furnizor'))
            <span class="help-block">
                <strong>{{ $errors->first('furnizor') }}</strong>
            </span>
            @endif              
        </div> 
    </div>

    <div class="col-md-6">

        <div class="form-group {{ $errors->has('marca') ? ' has-error' : '' }}">
            <label class="form-group {{ $errors->has('marca') ? 'help-block' : '' }}">Marca I.L.</label>
            <input type="text" class="form-control validate[required]" name="marca" id="marca" value="{{ old('marca') ? old('marca') : $il_posibil->marca }}" placeholder="marca instrument">
            @if ($errors->has('marca'))
            <span class="help-block">
                <strong>{{ $errors->first('marca') }}</strong>
            </span>
            @endif              
        </div>
        
        <div class="form-group {{ $errors->has('id_tip_il') ? ' has-error' : '' }}">
            <label class="form-group {{ $errors->has('id_tip_il') ? 'help-block' : '' }}">Tip proces de productie</label>
            <select name="id_tip_il" id="id_tip_il"  class="form-control" data-search="5">
                <option value="">Setare tip proces de porductie</option>
                @foreach ($tipuri_il as $index => $value)
                <option <?php echo $index == $il_posibil->id_tip_il ? 'selected="selected"' : ''; ?> value="{{ $index }}">{{ $value }}</option>
                @endforeach
            </select>
            @if ($errors->has('id_tip_il'))
            <span class="help-block">
                <strong>{{ $errors->first('id_tip_il') }}</strong>
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
        <a href="{{route('il-posibile::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 





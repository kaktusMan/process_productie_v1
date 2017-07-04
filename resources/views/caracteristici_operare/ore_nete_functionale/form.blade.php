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
    <div class="col-md-12">
            <div class="form-group {{ $errors->has('ore_nete_op') ? ' has-error' : '' }}">
                 <label class="form-group {{ $errors->has('ore_nete_op') ? 'help-block' : '' }}">Numar de ore nete de lucru ale operatorilor</label>
                <input type="text" class="form-control validate[required]" name="ore_nete_op" id="ore_nete_op" value="{{ old('ore_nete_op') ? old('ore_nete_op') : $nr_ore->ore_nete_op }}" placeholder="ore nete op">
                @if ($errors->has('ore_nete_op'))
                <span class="help-block">
                    <strong>{{ $errors->first('ore_nete_op') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('ore_nete_il') ? ' has-error' : '' }}">
                 <label class="form-group {{ $errors->has('ore_nete_il') ? 'help-block' : '' }}">Numar de ore nete de lucru ale Il</label>
                <input type="text" class="form-control validate[required]" name="ore_nete_il" id="ore_nete_il" value="{{ old('ore_nete_il') ? old('ore_nete_il') : $nr_ore->ore_nete_il }}" placeholder="ore nete il">
                @if ($errors->has('ore_nete_il'))
                <span class="help-block">
                    <strong>{{ $errors->first('ore_nete_il') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('id_nr_schimb') ? ' has-error' : '' }}">
                <label class="form-group {{ $errors->has('id_nr_schimb') ? 'help-block' : '' }}">Numar de schimburi de lucru</label>
                <select name="id_nr_schimb" id="id_nr_schimb"  class="form-control  validate[required]" data-search="5">
                    <option value="">Setare schimb de lucru</option>
                    @foreach ($nr_schimburi as $key => $option)
                    <option <?php echo $key == $nr_ore->id_nr_schimb ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_nr_schimb'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_nr_schimb') }}</strong>
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
        <a href="{{route('ore-functionale::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 
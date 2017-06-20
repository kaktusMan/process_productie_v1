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
            <div class="form-group {{ $errors->has('id_prp') ? ' has-error' : '' }}">
                <label class="form-group {{ $errors->has('id_prp') ? 'help-block' : '' }}">Proces de productie</label>
                <select name="id_prp" id="id_prp"  class="form-control" data-search="5">
                    <option value="">Setare proces de productie</option>
                    @foreach ($procese_productie as $key => $option)
                    <option <?php echo $key == $nr_schimb->id_prp ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_prp'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_prp') }}</strong>
                </span>
                @endif
            </div> 
            <div class="form-group {{ $errors->has('val') ? ' has-error' : '' }}">
                <label class="form-group {{ $errors->has('val') ? 'help-block' : '' }}">Numar de schimburi</label>
                <select name="val" id="val"  class="form-control" data-search="5">
                    <option value="">Setare numar de schimburi</option>
                    @foreach ($val_optiuni as $key1 => $val)
                    <option <?php echo $val == $nr_schimb->val ? 'selected="selected"' : ''; ?> value="{{ $val }}">{{ $key1 }}</option>
                    @endforeach
                </select>
                @if ($errors->has('val'))
                <span class="help-block">
                    <strong>{{ $errors->first('val') }}</strong>
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
        <a href="{{route('schimburi-de-lucru::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 

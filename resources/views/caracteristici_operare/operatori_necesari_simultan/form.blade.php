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
            <div class="form-group {{ $errors->has('operatori') ? ' has-error' : '' }}">
               <label class="form-group {{ $errors->has('operatori') ? 'help-block' : '' }}">Selectare operatori</label>
                <select class="form-control" name="operatori[]" multiple>
                    @foreach ($operatori as $key1 => $option)
                    <option <?php echo in_array($key1, str_split($operator_necesar->id_op)) ? 'selected="selected"' : "" ?> value="{{ $key1 }}">{{ $option }}</option>
                    @endforeach 
                </select>
                @if ($errors->has('operatori'))
                <span class="help-block">
                    <strong>{{ $errors->first('operatori') }}</strong>
                </span>
                @endif  
            </div>
            
            <div class="form-group {{ $errors->has('id_il') ? ' has-error' : '' }}">
               <label class="form-group {{ $errors->has('id_il') ? 'help-block' : '' }}">Instrumente de lucru</label>
                <select name="id_il" id="id_il"  class="form-control validate[required]" data-search="5">
                    <option value="">Setare instrumente de lucru</option>
                    @foreach ($lista_il as $key => $option)
                    <option <?php echo $key == $operator_necesar->id_il ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
                    @endforeach
                </select>
                @if ($errors->has('id_il'))
                <span class="help-block">
                    <strong>{{ $errors->first('id_il') }}</strong>
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
        <a href="{{route('operatori-necesari::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 







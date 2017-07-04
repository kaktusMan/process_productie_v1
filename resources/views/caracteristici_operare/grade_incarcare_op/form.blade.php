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
        <div class="form-group {{ $errors->has('grad_de_incarcare') ? ' has-error' : '' }}">
            <label class="form-group {{ $errors->has('grad_de_incarcare') ? 'help-block' : '' }}">Grad de incarcare operator</label>
            <input type="text" class="form-control validate[required]" name="grad_de_incarcare" id="grad_de_incarcare" value="{{ old('grad_de_incarcare') ? old('grad_de_incarcare') : $grad->grad_de_incarcare }}" placeholder="grad">
            @if ($errors->has('grad_de_incarcare'))
            <span class="help-block">
                <strong>{{ $errors->first('grad_de_incarcare') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group {{ $errors->has('id_op') ? ' has-error' : '' }}">
            <label class="form-group {{ $errors->has('id_op') ? 'help-block' : '' }}">Operator</label>
            <select name="id_op" id="id_op"  class="form-control validate[required]" data-search="5">
                <option value="">Setare operator</option>
                @foreach ($operatori as $key => $option)
                <option <?php echo $key == $grad->id_op ? 'selected="selected"' : ''; ?> value="{{ $key }}">{{ $option }}</option>
                @endforeach
            </select>
            @if ($errors->has('id_op'))
            <span class="help-block">
                <strong>{{ $errors->first('id_op') }}</strong>
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
        <a href="{{route('grad-incarcare::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 
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
        <div class="form-group {{ $errors->has('nume') ? ' has-error' : '' }}">
                <label class="form-group {{ $errors->has('nume') ? 'help-block' : '' }}">Lista caracteristici tehnice relevante</label>
                <select name="nume" id="nume"  class="form-control required" data-search="5">
                    <option value="">Setare caracteristica tehnice relevante</option>
                    @foreach ($caracteristici_relevante as $index => $value)
                    <option <?php echo $index == $caracteristica->nume ? 'selected="selected"' : ''; ?> value="{{ $value }}">{{ $value }}</option>
                    @endforeach
                </select>
                @if ($errors->has('nume'))
                <span class="help-block">
                    <strong>{{ $errors->first('nume') }}</strong>
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
        <a href="{{route('caracteristici::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 

                      
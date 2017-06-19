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
            <label class="form-group {{ $errors->has('nume') ? 'help-block' : '' }}">Nume grad </label>
            <input type="text" class="form-control validate[required]" name="nume" id="nume" value="{{ old('nume') ? old('nume') : $grad->nume }}" placeholder="Nume grad de libertate">
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
        <a href="{{route('grade::list') }}" class="btn btn-warning btn-lg button-widtht"><i class="fa fa-angle-left"></i> &nbsp;Înapoi</a>
    </div>
</div> 

                      
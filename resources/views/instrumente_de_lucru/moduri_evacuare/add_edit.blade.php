@extends('layouts.plane')

@section('title')
    <p>{{ $form_title }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ $form_route }}" class="validationEngine" method="POST">
                @include('instrumente_de_lucru.moduri_evacuare.form', ['mod_evacuare' => $mod_evacuare])
            </form>
        </div>
    </div>
@stop
@extends('layouts.plane')

@section('title')
    <p>{{ $form_title }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ $form_route }}" class="validationEngine" method="POST">
                @include('caracteristici_operare.tipuri_operatori.form', ['tip_operator' => $tip_operator])
            </form>
        </div>
    </div>
@stop
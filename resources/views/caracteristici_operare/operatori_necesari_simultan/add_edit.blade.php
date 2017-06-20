@extends('layouts.plane')

@section('title')
    <p>{{ $form_title }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ $form_route }}" class="validationEngine" method="POST">
                @include('caracteristici_operare.operatori_necesari_simultan.form', ['operator_necesar' => $operator_necesar])

            </form>
        </div>
    </div>
@stop
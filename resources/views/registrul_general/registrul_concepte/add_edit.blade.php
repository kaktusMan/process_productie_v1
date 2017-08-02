@extends('layouts.plane')

@section('title')
    <p>{{ $form_title }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ $form_route }}" class="validationEngine" method="POST">
                @include('registrul_general.registrul_concepte.form', ['concept' => $concept])
            </form>
        </div>
    </div>
@stop
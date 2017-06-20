@extends('layouts.plane')

@section('title')
    <p>{{ $form_title }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ $form_route }}" class="validationEngine" method="POST"> 
                @include('instrumente_de_lucru.~componente.aferente_prp.form', ['il_aferent' => $il_aferent])
            </form>
        </div>
    </div>
@stop
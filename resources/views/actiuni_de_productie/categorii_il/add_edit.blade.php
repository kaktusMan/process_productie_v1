@extends('layouts.plane')

@section('title')
    <p>{{ $form_title }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ $form_route }}" class="validationEngine" method="POST">
                @include('actiuni_de_productie.categorii_il.form', ['categorie' => $categorie])
            </form>
        </div>
    </div>
@stop

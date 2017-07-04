@extends('layouts.plane')

@section('title')
    <p>{{ $form_title }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ $form_route }}" class="validationEngine" method="POST">
                @include('caracteristici_operare.ore_nete_functionale.form', ['nr_ore' => $nr_ore])

            </form>
        </div>
    </div>
@stop
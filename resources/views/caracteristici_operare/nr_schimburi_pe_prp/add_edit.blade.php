@extends('layouts.plane')

@section('title')
    <p>{{ $form_title }}</p>
@stop

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ $form_route }}" class="validationEngine" method="POST">
                @include('caracteristici_operare.nr_schimburi_pe_prp.form', ['nr_schimb' => $nr_schimb])
            </form>
        </div>
    </div>
@stop
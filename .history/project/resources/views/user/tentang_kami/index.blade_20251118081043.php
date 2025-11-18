@extends('user.layouts.app')

@section('title', 'Tentang Kami')

@section('content')
    <section class="hero-section text-white py-5">
        <div class="container text-center py-5">
            {!! Form::hidden($name, $value, [$options]) !!}
        </div>
    </section>
@endsection

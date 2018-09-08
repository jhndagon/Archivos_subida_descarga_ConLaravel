@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($archivos as $archivo)
            <div class="row">
                <div class="col-md-2">{{ $archivo['id'] }}</div>
            <div class="col-md-6"><a href="{{ url('/docs' . $archivo['ruta']) }}">url</a></div>
            </div>
        @endforeach

    </div>
@endsection
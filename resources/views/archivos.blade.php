@extends('layouts.app')

@section('content')

    <div class="container">
        <form method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="form-group">
                <label for="archivo" class="custom-file">Archivo</label>
                <input type="file" name="archivo" class="custom-file-control">
                <span class="custom-file-control"></span>
            </div>
            <div class="form-group">
                <button >Enviar</button>
            </div>
        </form>
    </div>

@endsection
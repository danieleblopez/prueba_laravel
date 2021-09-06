@extends('layouts.base')
@section('title', 'Crear Clase')
@section('body')
    <form action="{{ route('lessons.store') }}" method="post">
        @if($errors->any())
            {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
        @endif
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        {{ csrf_field() }}
    </form>
@endsection

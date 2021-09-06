@extends('layouts.base')
@section('title', 'Editar Clase: ' . $lesson->name)
@section('body')
    <form action="{{ route('lessons.update', [$lesson->id]) }}" method="post">
        @if($errors->any())
            {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
        @endif
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $lesson->name) }}">
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea class="form-control" id="description" name="description">{{ old('description', $lesson->description) }}</textarea>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="put">
    </form>
@endsection

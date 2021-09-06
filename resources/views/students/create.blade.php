@extends('layouts.base')
@section('title', 'Crear Estudiante')
@section('body')
    <form action="{{ route('students.store') }}" method="post">
        @if($errors->any())
            {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
        @endif
        <div class="form-group">
            <label for="first_name">Nombre:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}">
        </div>
        <div class="form-group">
            <label for="last_name">Apellido:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}">
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
        </div>
        <div class="form-group">
            <label for="lessons">Clases:</label>
            <select class="form-control" id="lessons" name="lessons[]" multiple>
                @foreach($lessons as $lesson)
                    <option value="{{ $lesson->id }}">{{ $lesson->name }}</option>
                @endforeach
            </select>
        </div>
        <hr>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        {{ csrf_field() }}
    </form>
@endsection

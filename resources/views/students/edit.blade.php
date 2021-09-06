@extends('layouts.base')
@section('title', 'Editar Estudiante')
@section('body')
    <form action="{{ route('students.update', [$student->id]) }}" method="post">
        @if($errors->any())
            {!! implode('', $errors->all('<div style="color: red;">:message</div>')) !!}
        @endif
        <div class="form-group">
            <label for="first_name">Nombre:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $student->first_name) }}">
        </div>
        <div class="form-group">
            <label for="last_name">Apellido:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $student->last_name) }}">
        </div>
        <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email) }}">
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
        <input type="hidden" name="_method" value="put">
    </form>
@endsection
@section('js')
    <script>
        window.onload = function() {
            const lessons = JSON.parse('{{ json_encode($student->lessons->pluck('id')->toArray()) }}');
            let element = document.getElementById('lessons');
            for (let i = 0; i < element.options.length; i++) {
                element.options[i].selected = lessons.indexOf(parseInt(element.options[i].value)) >= 0;
            }
        };
    </script>
@append

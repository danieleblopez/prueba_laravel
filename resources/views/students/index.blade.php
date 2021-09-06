@extends('layouts.base')
@section('title', 'Listado de Estudiantes')
@section('body')
    <div class="row">
        <div class="col-md-12" style="text-align: right;">
            <a class="btn btn-primary" href="{{ route('students.create') }}">Crear</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo electrónico</th>
                        <th scope="col">Clases</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                @foreach($students as $key => $student)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->lessons->count() }}</td>
                        <td>
                            <a class="btn btn-light" href="{{ route('students.show', [$student->id]) }}">Ver</a>
                        </td>
                        <td>
                            <a class="btn btn-dark" href="{{ route('students.edit', [$student->id]) }}">Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-danger student-destroy" data-student-id="{{ $student->id }}" href="#">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <form method="post" action="" id="form_destroy">
        <input type="hidden" name="_method" value="delete">
        {{ csrf_field() }}
    </form>
@append
@section('js')
    <script>
        window.onload = function() {
            let elements = document.getElementsByClassName('student-destroy');
            for(let i = 0; i < elements.length; i++) {
                (function(element) {
                    element.addEventListener('click', function() {
                        let form = document.getElementById('form_destroy');
                        let action = '/students/' + element.getAttribute('data-student-id');
                        form.setAttribute('action', action);
                        form.submit();
                    });
                })(elements[i]);
            }
        };
    </script>
@append

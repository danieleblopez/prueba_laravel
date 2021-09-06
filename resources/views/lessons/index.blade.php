@extends('layouts.base')
@section('title', 'Listado de Clases')
@section('body')
    <div class="row">
        <div class="col-md-12" style="text-align: right;">
            <a class="btn btn-primary" href="{{ route('lessons.create') }}">Crear</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($lessons as $key => $lesson)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $lesson->name }}</td>
                            <td>{{ $lesson->description }}</td>
                            <td>
                                <a class="btn btn-light" href="{{ route('lessons.show', [$lesson->id]) }}">Ver</a>
                            </td>
                            <td>
                                <a class="btn btn-dark" href="{{ route('lessons.edit', [$lesson->id]) }}">Editar</a>
                            </td>
                            <td>
                                <a class="btn btn-danger lesson-destroy" data-lesson-id="{{ $lesson->id }}" href="#">Eliminar</a>
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
            let elements = document.getElementsByClassName('lesson-destroy');
            for(let i = 0; i < elements.length; i++) {
                (function(element) {
                    element.addEventListener('click', function() {
                        let form = document.getElementById('form_destroy');
                        let action = '/lessons/' + element.getAttribute('data-lesson-id');
                        form.setAttribute('action', action);
                        form.submit();
                    });
                })(elements[i]);
            }
        };
    </script>
@append

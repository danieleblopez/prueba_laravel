@extends('layouts.base')
@section('title', 'Ver Estudiante')
@section('body')
    <h5>Nombre: {{ $student->first_name }}</h5>
    <h5>Apellido: {{ $student->last_name }}</h5>
    <h5>Correo electrónico: {{ $student->email }}</h5>
    <h5>Clases: {{ $lessons }}</h5>
    <h5>Creación: {{ $student->created_at->format('d/m/Y H:i') }}</h5>
@endsection

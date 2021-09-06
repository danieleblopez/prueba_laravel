@extends('layouts.base')
@section('title', 'Ver Clase')
@section('body')
    <h5>Nombre: {{ $lesson->name }}</h5>
    <h5>Descripción: {{ $lesson->description }}</h5>
    <h5>Creación: {{ $lesson->created_at->format('d/m/Y H:i') }}</h5>
@endsection

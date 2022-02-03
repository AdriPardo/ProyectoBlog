@extends('plantilla')
@section('titulo', 'Ficha post')
@section('contenido')

<h1>Ficha del post {{$post->id}} con titulo: {{$post->titulo}} creado el {{$post->created_at->format('d-m-Y') }} a las {{$post->created_at->format('H:m:s') }}</h1>

@endsection

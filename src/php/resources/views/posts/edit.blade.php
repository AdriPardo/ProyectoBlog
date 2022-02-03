@extends('plantilla')
@section('titulo', 'Actualizar Post')
@section('contenido')
<h1>Actualizar Post</h1>

<form action="{{ route('posts.update', $post->id)}}" method="POST">
@method('PUT')
@csrf

<div class="form-group">
<label for="titulo">Título:</label>


@if ($errors->has('titulo'))
<input type="text" class="form-control" name="titulo"
id="titulo">
<div class="text-danger">
{{ $errors->first('titulo') }}
</div>

@else
<input type="text" class="form-control" name="titulo"
id="titulo" value="{{ $post->titulo }}">
@endif
</div>

<div class="form-group">
<label for="contenido">Contenido:</label>


@if ($errors->has('contenido'))
<input type="text" class="form-control" name="contenido"
id="contenido" size="75">
<div class="text-danger">
{{ $errors->first('contenido') }}
</div>

@else
<input type="text" class="form-control" name="contenido"
id="contenido" size="75" value="{{ $post->contenido }}">
@endif
</div>

<div class="form-group">
<label for="user">Usuario:</label>
<select class="form-control" name="user" id="user">
<option value="{{ $user->id }}">
{{ $user->login }}
</option>
@foreach ($users as $user)
<option value="{{ $user->id }}">
{{ $user->login }}
</option>
@endforeach
</select>
</div>

<input type="submit" name="enviar" value="Enviar"
class="btn btn-dark btn-block">

</form>
@endsection

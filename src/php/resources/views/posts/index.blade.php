@extends('plantilla')
@section('titulo', 'Listado de posts')
@section('contenido')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titulo</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>

            @forelse ($posts as $post)
                <tr>
                    <th scope="row">{{ $post->titulo }} ({{ $post->user->login }})</th>
                    <td><a href='{{ route('posts.show', $post->id) }}'><button class="btn btn-primary">Ver</button></a></td>
                        @if (auth()->check())
                        <td>  <a href='{{ route('posts.edit', $post->id) }}'><button
                                    class="btn btn-warning">Editar</button></a></td>
                                    <td><form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger">Borrar</button></td>
                            </form>
                        @endif
                    </tr>
                @empty

            @endforelse
            </ul>
        @endsection






    </tbody>
</table>

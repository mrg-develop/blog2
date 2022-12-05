@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                            Artículos
                            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary float-end">Crear</a>

                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class='table'>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titulo</th>
                                <th>Imagen</th>
                                <th colspan='2'>&nbsp;</th>
                            </tr>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td> {{ $post->id }} </td>
                                    <td> {{ $post->title }} </td>
                                    <td>
                                    @if ($post->image)
                                        <img src="{{ $post->get_image }}" class="card-img-top" />
                                    @elseif ($post->iframe)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        {!! $post->iframe !!}
                                    </div>
                                    @endif

                                    </td>
                                    <td>
                                        <a href="{{ route('posts.edit', $post) }}" class='btn btn-primary btn-sm'>Editar</a>
                                    </td>
                                    <td>
                                    <form action="{{ route('posts.destroy', $post)}}" method="POST">
                                        @csrf
                                        @method('DELETE')     
                                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger" 
                                        onClick="return confirm('Desea Eliminar?')"/>
                                    </form>
                                    </td>

                                </tr>
                                
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

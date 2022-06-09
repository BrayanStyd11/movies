@include('layouts/app')
@section('sidebar')
    <div class="container">
        <div class="card">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card-header">
                <div class="row">
                    <div class="col">
                    <h1>Peliculas</h1>
                    </div>
                    <div class="col">
                        <a href="{{ route('movies.create')}}" class="btn btn-outline-primary-xs">Crear</a>
                    </div>                    
                </div>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de Lanzamiento</th>
                            <th>Precio</th>
                            <th>Categoria</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{ $movie->name }}</td>
                                <td>{{ $movie->release_date }}</td>
                                <td>{{ $movie->price }}</td>
                                <td>{{ $movie->categories->name }}</td>
                                <td>
                                    <a class="btn btn-outline-primary btn-xs" href="{{ route('movies.edit',['movie'=>$movie->id])}}">Editar</a>
                                    {{ Form::open(['method' => 'DELETE','route' => ['movies.destroy', $movie->id],'style'=>'display:inline']) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-xs']) }}
                                    {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@show
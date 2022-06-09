@include('layouts/app')
@section('sidebar')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Actualización de Pelicula</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('movies.update', $movie->id) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" name="name" value="{{$movie->name}}" class="form-control">                        
                    </div>

                    <div class="mb-3 form-group">
                        <label for="release_date" class="form-label">Fecha de Lanzamiento</label>                        
                        <input type="date" id="release_date" name="release_date" value="{{$movie->release_date}}" class="form-control">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="price" class="form-label">Precio</label>                        
                        <input type="number" id="price" name="price" value="{{$movie->price}}" class="form-control">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="id_category" class="form-label">Categoria</label>
                        <select wire:model="{{$movie->id_category}}" name="id_category" id="id_category" class="form-control">
                        @foreach($movie->categories as $category)
                            <option value="{{ $category->id }}" {{ $movie->id_category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>
                
                    <div class="mb-3 form-group">
                        <button class="btn btn-outline-primary" type="submit">Editar</button>
                        <a href="{{ route('movies.index') }}" class="btn btn-default">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@show
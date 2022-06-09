@include('layouts/app')
@section('sidebar')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Creación de Pelicula</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="/movies">
                    @csrf                                   
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="release_date" class="form-label">Fecha de Lanzamiento</label>
                        <input type="date" id="release_date" name="release_date" value="{{ old('release_date') }}" class="form-control">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="price" class="form-label">Precio</label>
                        <input type="number" id="price" name="price" value="{{ old('price') }}" class="form-control">
                    </div>

                    <div class="mb-3 form-group">
                        <label for="category" class="form-label">Categoria</label>
                        <select value="{{ old('id_category') }}" name="id_category" id="id_category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="mb-3 form-group">
                        <button class="btn btn-outline-primary" type="submit">Crear</button>
                        <a href="{{ route('movies.index') }}" class="btn btn-default">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@show
@include('layouts/app')
@section('sidebar')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Actualización de Categoría</h1>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('categories.update', $category->id) }}">
                    @method('patch')
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label">Categoria</label>
                        <input type="text" id="name" name="name" value="{{$category->name}}" class="form-control">                        
                    </div>
                    <div class="mb-3 form-group">
                        <button class="btn btn-outline-primary" type="submit">Editar</button>
                        <a href="{{ route('categories.index') }}" class="btn btn-default">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@show
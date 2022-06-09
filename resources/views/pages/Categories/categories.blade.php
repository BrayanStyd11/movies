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
                <h1>Categorias</h1>
                <a href="{{ route('categories.create')}}" class="btn btn-outline-primary-xs">Crear</a>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover table-responsive">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a class="btn btn-outline-primary btn-xs" href="{{ route('categories.edit',['category'=>$category->id])}}">Editar</a>
                                    {{ Form::open(['method' => 'DELETE','route' => ['categories.destroy', $category->id],'style'=>'display:inline']) }}
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
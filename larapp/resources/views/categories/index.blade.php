@extends('layouts.app')
@section('title', 'LARAPP - Lista de Categorias')

@section('content')
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<h1> <i class="fa fa-dice-d20"></i> Lista de Categorias</h1>
			<hr>
			<a href="{{ route('categories.create') }}" class="btn btn-success">
				<i class="fa fa-plus"></i>
				Adicionar Categoria
			</a>
			<br><br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th class="d-none d-sm-table-cell">Descripción</th>
						<th class="d-none d-sm-table-cell">Fecha de creación</th>
						<th>Imagen</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $category)
						<tr>
							<td>{{ $category->name }}</td>
							<td class="d-none d-sm-table-cell">{{ $category->description }}</td>
							<td class="d-none d-sm-table-cell">{{ $category->created_at }}</td>
							<td><img src="{{ asset($category->image) }}" width="36px"></td>
							<td>
								<a href="{{ url('categories/'.$category->id) }}" class="btn btn-sm btn-light"><i class="fa fa-search"></i></a>
								<a href="{{ url('categories/'.$category->id.'/edit') }}" class="btn btn-sm btn-light"><i class="fa fa-pen"></i></a>
								<form action="{{ url('categories/'.$category->id) }}" method="POST" class="d-inline">
									@csrf
									@method('delete')
									<button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
            </table>
            <div class="ml-auto mr-auto">
                {{$categories->links()}}
            </div>

		</div>
	</div>
@endsection
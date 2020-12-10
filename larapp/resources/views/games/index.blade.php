@extends('layouts.app')
@section('title', 'LARAPP - Lista de Juegos')

@section('content')
	<div class="row">
		<div class="col-md-10 offset-md-1">
			<h1> <i class="fas fa-gamepad"></i> Lista de Juegos </h1>
			<hr>
			<a href="{{ url('games/create') }}" class="btn btn-success"> 
				<i class="fa fa-plus"></i>
				Adicionar Juego 
			</a>
			@if (Auth::user()->role == 'Admin')
				<form action="{{ url('import/excel/games') }}" method="POST" enctype="multipart/form-data" class="d-inline">
					@csrf
					<input type="file" class="d-none" id="file" name="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
					<button type="button" class="btn btn-success btn-excel">
						<i class="fa fa-file-excel"></i> 
						Importar Juegos
					</button>
				</form>
				<a href="{{ url('generate/pdf/games') }}" class="btn btn-larapp"> 
					<i class="fa fa-file-pdf"></i>
					Exportar PDF 
				</a>
				<a href="{{ url('generate/excel/games') }}" class="btn btn-larapp"> 
					<i class="fa fa-file-excel"></i>
					Exportar Excel 
				</a>
			@endif
			
			<input type="hidden" id="tmodel" value="games">
            <input type="text" id="qsearch" name="qsearch" class="form-search" autocomplete="off" placeholder="Buscar">
            <br>
            <div class="loader d-none text-center mt-5">
                <img src="{{ asset('imgs/loader.gif')}}" width="100px">
            </div>
			<br><br>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Nombre</th>
						<th class="d-none d-sm-table-cell">Categoría</th>
						<th>Imagen</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody id="content">
					@foreach ($games as $game)
						<tr>
							<td>{{ $game->name }}</td>
							<td class="d-none d-sm-table-cell">
								<img src="{{ asset($game->category->image) }}" width="36px">
							</td>
							<td><img src="{{ asset($game->image) }}" width="36px"></td>
							<td>
								<a href="{{ url('games/'.$game->id) }}" class="btn btn-sm btn-light"><i class="fa fa-search"></i></a>
								<a href="{{ url('games/'.$game->id.'/edit') }}" class="btn btn-sm btn-light"><i class="fa fa-pen"></i></a>
								<form action="{{ url('games/'.$game->id) }}" method="POST" class="d-inline">
									@csrf
									@method('delete')
									<button type="button" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i></button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $games->links() }}
		</div>
	</div>
@endsection
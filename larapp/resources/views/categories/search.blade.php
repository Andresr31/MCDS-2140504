@forelse($categories as $category)
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
@empty
    <tr>
		<td class="text-center" colspan="5">
			No hay Categorias con este Nombre o Descripción.
		</td>
	</tr>
@endforelse

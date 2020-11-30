
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCIÓN</th>
        <th>FECHA DE CREACIÓN</th>
        <th>IMAGEN</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{{ $category->id}}</td>
            <td>{{ $category->name}}</td>
            <td>{{ $category->description}}</td>
            <td>{{ $category->created_at}}</td>
            <td><img src="{{ public_path().'/'.$category->image }}" width="40px"></td>
        </tr>
    @endforeach
    </tbody>
</table>

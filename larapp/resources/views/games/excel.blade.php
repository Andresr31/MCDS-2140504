<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>DESCRIPCIÓN</th>
        <th>USUARIO</th>
        <th>CATEGORIA</th>
        <th>IMAGEN</th>
    </tr>
    </thead>
    <tbody>
    @foreach($games as $game)
        <tr>
            <td>{{ $game->id }}</td>
            <td>{{ $game->name }}</td>
            <td>{{ $game->description }}</td>
            <td>{{ $game->user->fullname }}</td>
            <td>{{ $game->category->name }}</td>
            <td><img src="{{ public_path().'/'.$game->image }}" width="40px"></td>
        </tr>
    @endforeach
    </tbody>
</table>
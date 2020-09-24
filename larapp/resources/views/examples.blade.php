@extends('layouts.app')

@section('content')
    <div class="card card-dark bg-dark text-light container my-5 justify-content-center">
        <div class="card-header text-center">
            <h3>Usuarios</h3>
        </div>
        <div class="card-body">
            <h5><strong>El numero de usuarios es: </strong>{{ $users->count() }} </h5>
            {{-- If-elseif-else Directive --}}
            @if ($users->count() < 4)
                <h6 class="text-danger">Hay pocos usuarios</h6>
            @elseif($users->count()>=4 && $users->count()<=7) <h6 class="text-warning">Hay usuarios moderados</h6>
                @else
                    <h6 class="text-primary">Hay muchos usuarios</h6>
            @endif

            <div class="py-3 justify-content-center">
                <table class="table table-bordered table-hover table-warning">
                    {{-- Foreach Directive --}}
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->fullname }}</td>
                            <td>
                                {{-- Switch Directive --}}
                                @switch($user->gender)
                                    @case('male')
                                        Masculino
                                    @break
                                    @case('female')
                                        Femenino
                                    @break
                                    @default
                                        Otro
                                @endswitch
                            </td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->birthdate }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    <div class="card card-dark bg-dark text-light container my-5 justify-content-center">
        <div class="card-header text-center">
            <h3>Categorias</h3>
        </div>
        <div class="card-body">
            <h5><strong>El numero de categorias es: </strong>{{ $categories->count() }} </h5>
            {{-- If-elseif-else Directive --}}
            @if ($categories->count() < 2)
                <h6 class="text-danger">Hay pocos categorias</h6>
            @elseif($categories->count()>=3 && $categories->count()<=5) <h6 class="text-warning">Hay categorias moderados</h6>
                @else
                    <h6 class="text-primary">Hay muchos categorias</h6>
            @endif

            <div class="py-3 justify-content-center">
                <table class="table table-bordered table-hover table-warning">
                    {{-- Forelse Directive --}}
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                        @empty
                            <h5 class="text-secondary text-center">No hay categorias</h5>
                    @endforelse
                </table>
            </div>
        </div>
    </div>

    <div class="card card-dark bg-dark text-light container my-5 justify-content-center">
        <div class="card-header text-center">
            <h3>Juegos</h3>
        </div>
        <div class="card-body">
            <h5><strong>El numero de juegos es: </strong>{{ $games->count() }} </h5>
            {{-- If-elseif-else Directive --}}
            @if ($games->count() < 2)
                <h6 class="text-danger">Hay pocos juegos</h6>
            @elseif($games->count()>=3 && $games->count()<=5) <h6 class="text-warning">Hay juegos moderados</h6>
                @else
                    <h6 class="text-primary">Hay muchos juegos</h6>
            @endif

            <div class="py-3 justify-content-center">
                <table class="table table-bordered table-hover table-warning">
                    {{-- Php Directive --}}
                    @php
                        $i = 0
                    @endphp
                    {{-- While Directive --}}
                    @while ($i< $games->count())
                        @php
                            $game = $games->get($i)
                        @endphp
                        <tr>
                            <td>{{$game->name}}</td>
                        </tr>
                        @php
                            $i++
                        @endphp
                    @endwhile
                </table>
            </div>
        </div>
    </div>
@endsection

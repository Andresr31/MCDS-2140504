@extends('layouts.app')

@section('content')
    {{-- Jose Celestino Mutis - 45 años - creado hace 2 semanas. --}}
    @foreach ($users as $user)
        <div class="card bg-dark pl-3 text-light my-1">
        <h3>{{$user->fullname}} - {{$user->age}} años - Creado hace {{$user->created}}</h3>
        </div>
    @endforeach

@endsection

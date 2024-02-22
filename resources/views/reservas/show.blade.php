@extends('layouts.main')

@section('title', $reserva->title)

@section('content')

<div id="reservas-container" class="col-md-12">
    {{-- @if ($search)
        <h2>Buscando por: {{ $search }}</h2>
    @else --}}
        <h2>Próximas reservas</h2>
    {{-- @endif --}}
    <p class="subtitle">Veja as reservas dos próximos dias</p>
    <div id="cards-container" class="row">
        @foreach($reservas as $reserva)
        <div class="card col-md-3">
            <div class="card-body">
                <p class="card-date">{{ date('d/m/Y', strtotime($reserva->data)) }}</p>
                @foreach($users as $user)
                    @if($user->id == $reserva->user_id)
                        <p class="card-title">{{ $user->name }}</p>
                        @break
                    @endif
                @endforeach
                <p class="card-title">Mesa {{ $reserva->mesa_id }}</p>
                <h5 class="card-title">{{ $reserva->inicio }} até {{ $reserva->fim }}</h5>
                {{-- <a href="/reservas/{{ $reserva->id }}" class="btn btn-primary">Saber mais</a> --}}
            </div>
        </div>
        @endforeach
        @if (count($reservas) == 0)
            <p>Não foi possivel encontrar nenhuma reserva</p>   
        @elseif(count($reservas) == 0)
            <p>Não há reservaos disponíveis</p> 
        @endif
    </div>
</div>

@endsection
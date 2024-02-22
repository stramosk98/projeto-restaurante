@extends('layouts.main')

@section('title', 'Restaurante')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Reservas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-reservas-container">
    @if (count(reservas) > 0)

    @else
    <p>Você ainda não possui reservas, <a href="/reservas/create">Criar reservas</a></p>
    @endif
</div>

@endsection
@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Reservas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-reservas-container">
    @if (count($reservas) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Mesa</th>
                <th scope="col">Dia</th>
                <th scope="col">Horário</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservas as $reserva)
                <tr>
                    <td scropt="row">{{ $reserva->mesa_id}}</td>
                    <td scropt="row">{{ date('d/m/Y', strtotime($reserva->data)) }}</td>
                    <td scropt="row">{{ $reserva->inicio}} até {{ $reserva->fim }}</td>
                    <td><a href="/reservas/{{ $reserva->id }}">{{ $reserva->title }}</a></td>
                    {{-- <td>{{ count($reserva->user_id) }}</td> --}}
                    <td>
                        <form action="/reservas/{{ $reserva->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Você ainda não possui reservas, <a href="/reservas/create">Criar uma reserva</a></p>
    @endif
</div>
@endsection
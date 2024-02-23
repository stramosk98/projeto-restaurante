@extends('layouts.main')

@section('title', 'Reservar Mesa')

@section('content')

<div  id="atendimento-container" class="col-md-6 offset-md-1">
    <h3>Horário de atendimento 
        <br> SEG à SAB: 18:00 as 23:59 
        <br> DOM: 11:00 as 23:59
    </h3>
</div>
<div id="reserva-create-container" class="col-md-6 offset-md-3">
    <h1>Reserve sua Mesa</h1>
    <form action="/reservas" method="POST" enctype="multipart/form-data">
        {{-- diretiva para permitir enviar os dados --}}
        @csrf 
        <div class="form-group">
            <label for="date">Data da Reserva:</label>
            <input type="date" class="form-control" id="data" name="data" min="{{ date("Y-m-d") }}" required>
        </div><br> 
        <div class="form-group">
            <label for="title">Horário da Reserva:</label><br>
            <input type="time" id="inicio" name="inicio" min="18:00" max="23:58" value="18:00" required /> até
            <input type="time" id="fim" name="fim" min="18:01" max="23:59" value="23:59" required />
        </div><br>
        <div class="form-group">
            <label for="title">Número da mesa:</label><br>
            <input type="number" id="nMesa" name="nMesa" min="1" max="15" required />
        </div><br>
        <input type="submit" class="btn btn-primary" value="Reservar Horário">
    </form>
</div>
<script src="/js/script.js"></script>

@endsection
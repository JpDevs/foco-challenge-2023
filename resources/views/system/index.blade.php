@extends('template.layout')
@section('title')
    Home
@endsection
@section('content')
    <div id="deleted" style="display: none;" class="alert alert-success" role="alert">
        Reserva deletada com sucesso!
    </div>
    <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
    <a href="booking/new" class="btn btn-dark">Adicionar</a><br><br>
    <table id="table" class="table">
        <tr class="tr">
            <th>ID</th>
            <th>Nº Reserva</th>
            <th>Cliente</th>
            <th>Status</th>
            <th>Crianças</th>
            <th>Adultos</th>
            <th>Check-In</th>
            <th>Check-Out</th>
            <th>Ações</th>
        </tr>
        <tr>
        </tr>

    </table>

@endsection

@extends('template.layout')
@section('title')
    Editar Reserva
@endsection
@section('nav')
    <a href="/">Inicio</a> / <a href="../new">Adicionar Reserva</a> / Reserva Manual
@endsection
@section ('content')
    <div id="alertSuccess" style="display: none;" class="alert alert-success" role="alert">
        Criada com sucesso!
    </div>
    <script type="text/javascript" src="{{asset('js/manual-add.js')}}"></script>
    <br>
    <form id="booking_form" method="post" action="javascript:;">
        @csrf
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="booking_holder">Nome do cliente</label>
                <input type="text" class="form-control" value="" id="booking_holder" placeholder="Nome Completo"
                       required>
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="holder_email">Email do cliente</label>
                <input type="email" class="form-control" id="holder_email" value="" placeholder="exemplo@email.com">
            </div>
            <div class="form-group col-md-6">
                <label for="holder_phone">Telefone</label>
                <input type="tel" class="form-control" id="holder_phone" value="" >
            </div>
        </div>
        <hr>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="check_in">Check-In:</label>
                <input id="check_in" type="date" value="" class="form-control"></div>
            <div class="form-group col-md-6">
                <label for="check_out">Check-Out:</label>
                <input id="check_out" type="date" value="" class="form-control"></div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="kids">Crianças:</label>
                <input type="number" id="kids" min="0" step="1" max="7" value="" class="form-control"></div>
            <div class="form-group col-md-6">
                <label for="adults">Adultos:</label>
                <input type="number" id="adults" min="0" step="1" max="7" value="" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="SelectStatus">Status da Reserva</label>
            <select name="statusreserva" class="form-control" id="SelectStatus">
                <option value="1">Pendente</option>
                <option value="3">Recuperada</option>
                <option value="3">Confirmada</option>
                <option value="0">Cancelada</option>
            </select>


        </div>
        <center>
            <button type="submit" class="btn btn-primary">Salvar Reserva</button>


            <br><br><br></center>
    </form>

@endsection

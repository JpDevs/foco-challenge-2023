@extends('template.layout')
@section('title')
    Editar Reserva
@endsection
@section('nav')
    <a href="/">Inicio</a> / Editar
@endsection
@section ('content')
    <script type="text/javascript" src="{{asset('js/edit.js')}}"></script>
    <center><span id="booking_code">Reserva nº</span></center>
    <br>
    <div id="alertSuccess" style="display: none;" class="alert alert-success" role="alert">
        Reserva editada com sucesso!
    </div>
    <form onsubmit="submit(15)" method="post" id="booking_form" action="javascript:;">
        <input type="hidden" id="booking_id" value="{{request()->id}}">
        @csrf
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="booking_holder">Nome do cliente</label>
                <input type="text" class="form-control" value="" id="booking_holder" placeholder="Nome Completo" required>
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
                <input type="tel" class="form-control" id="holder_phone" value="" placeholder="exemplo@email.com">
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
            <label for="status">Status da Reserva</label>
            <select class="form-control" id="status">
                <option id="option1" value="1">Pendente</option>
                <option id="option3" value="3">Recuperada</option>
                <option id="option2" value="2">Confirmada</option>
                <option id="option0" value="0">Cancelada</option>
            </select>


        </div>
        <center>
            <button id="booking_submit" type="submit" class="btn btn-primary">Salvar Reserva</button>
            <a id="toggle" href="edit/xml" class="btn btn-warning">Carregar XML</a>

            <br><br><br></center>
    </form>

    <script>
        $(document).ready(function () {
            getItem({{request()->id}})
        })
    </script>

@endsection

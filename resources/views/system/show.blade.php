@extends('template.layout')
@section('title')
    Voucher Foco Hotel
@endsection
@section('nav')
@endsection
@section ('content')
    <script type="text/javascript" src="{{asset('js/voucher.js')}}"></script>
    <center><span id="booking_code">Reserva nº</span></center>
    <br>
    <form method="post" action="">
        @csrf
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="booking_holder">Nome do cliente</label>
                <input name="nomeCliente" readonly type="text" class="form-control" value="" id="booking_holder" placeholder="Nome Completo" required>
            </div>
            </div>
        <hr>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="holder_email">Email do cliente</label>
                <input type="email" readonly name="mailCliente" class="form-control" id="holder_email"  value="" placeholder="exemplo@email.com">
            </div>
            <div class="form-group col-md-6">
                <label for="holder_phone">Telefone</label>
                <input type="tel" readonly name="holder_phone" class="form-control" id="holder_phone"  value="" placeholder="exemplo@email.com">
            </div></div>
        <hr>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="check_in">Check-In:</label>
                <input id="check_in" type="date" readonly name="Checkin" value="" class="form-control"></div>
            <div class="form-group col-md-6">
                <label for="check_out">Check-Out:</label>
                <input id="check_out" type="date" readonly name="CheckOut" value="" class="form-control"></div>
        </div>
        <div class="form-group row">
            <div class="form-group col-md-6">
                <label for="kids">Crianças:</label>
                <input type="number" readonly id="kids" min="0" step="1"  max="7" value="" class="form-control"></div>
            <div class="form-group col-md-6">
                <label for="adults">Adultos:</label>
                <input type="number"  readonly id="adults" min="0" step="1" max="7" value="" class="form-control"></div>
        </div>
        <div class="form-group">
            <label for="status">Status da Reserva</label>
            <input id="status" type="text"  readonly value="" class="form-control"></div>


        </div>
        <center>
            <a class="btn btn-success d-print-none" href="/">Voltar</a>
            <a class="btn btn-warning d-print-none" onclick="window.print();" href="#">Imprimir</a>
            <br><br><br>
    </form>

    <script>
        $(document).ready(function () {
            getItem({{request()->id}})
        })
    </script>

@endsection


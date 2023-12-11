@extends('template.layout')
@section('title')
    Adicionar Reserva<br>
@endsection
@section('nav')
    <a href="/">Inicio </a>/ Adicionar Reserva
@endsection
@section ('content')
    <div id="alert" style="display: none;" class="alert" role="alert">
        message
    </div>

    <script type="text/javascript" src="{{asset('js/add.js')}}"></script>
    <center>
        <form method="post" action="javascript:;" id="booking_form" enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label for="xml">Insira o arquivo XML </label><br>
                <input name="xml" id="file" type="file" required accept=".xml"><br><br>
                <a href="new/manual" class="btn btn-primary">Reserva Manual</a>
                <button type="submit" class="btn btn-success">Adicionar</button>
            </div>
        </form>
    </center>
@endsection

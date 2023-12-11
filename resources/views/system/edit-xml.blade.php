@extends('template.layout')
@section('title')
    Adicionar Reserva<br>
@endsection
@section('nav')
    <a href="/">Inicio </a>/ <a href="../edit">Editar Reserva </a>/ Carregar XML
@endsection
@section ('content')
    <div id="alert" style="display: none;" class="alert" role="alert">
        message
    </div>

    <script type="text/javascript" src="{{asset('js/xml-edit.js')}}"></script>
    <center>
        <form method="post" action="javascript:;" id="booking_form" enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label for="xml">Insira o arquivo XML </label><br>
                <input name="xml" id="file" type="file" required accept=".xml"><br><br>
                <button type="submit" onclick="update({{request()->id}})" class="btn btn-success">Editar</button>
            </div>
        </form>
    </center>
@endsection

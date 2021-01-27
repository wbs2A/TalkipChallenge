@extends('base_templates/base')

@section('content')
    <div class="row">
    @foreach ($_return as $_list)
        <div class="col s12 m4">

        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <i class="activator fas fa-phone"></i>
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">{{$_list["list_name"]}}<i class="material-icons right">more_vert</i></span>
                @foreach($_list["contacts"] as $element)
                    <div style="display: block">
                        <i class="fas fa-phone"></i>
                        <ul style="display: inline">
                            <li style="display: inline"> Contato: {{$element->name}} &nbsp;|</li>
                            <li style="display: inline"> Telefone: {{$element->phone}} &nbsp;|</li>
                            <li style="display: inline"> CPF: {{$element->cpf}} &nbsp;|</li>
                            <li style="display: inline"> Status: {{$element->status}} </li>
                        </ul>
                        <br>
                    </div>

                @endforeach
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">{{$_list["list_name"]}}<i class="material-icons right">close</i></span>
                <p>Here is some more information about this product that is only revealed once clicked on.</p>
            </div>
        </div>
        </div>
    @endforeach
    </div>
@endsection

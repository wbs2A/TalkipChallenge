@extends('base_templates/base')

@section('content')
    <div class="row" style="padding-top: 10px;">
    @forelse($data as $_list)
        <div class="col s12 m4">

        <div class="card">
            <div class="card-image waves-effect waves-block waves-light">
                <div class="container center">
                    <img class="activator" src="/images/phone-auricular.png"
                         style="height:20vh; width: 15vw"/>
                </div>
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
                <p>Esta é sua lista "{{$_list["list_name"]}}"</p>
                <div class="row">
                    <div class="col">
                        <a href="" class="btn-floating btn-large waves-effect waves-light yellow"><i class="fas fa-edit"></i> </a>
                    </div>
                    <div class="col">
                        <a href="#" class="btn-floating btn-large waves-effect waves-light red"><i class="fas fa-trash"></i> </a>
                    </div>
                </div>

            </div>
        </div>

        </div>
            {{ $data->links() }}
        @empty
            @unless(Auth::check())
                <div class="container-fluid">
                    <h2> Você precisa fazer login para gerenciar suas listas</h2>
                </div>
            @else
                <h2> Você Ainda não inseriu nenhuma lista </h2>
            @endunless

    @endforelse
    </div>
@endsection

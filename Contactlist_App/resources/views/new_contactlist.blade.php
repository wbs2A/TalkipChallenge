@extends('.base_templates/base')
@section('content')
    <div class="container">
        <h2> Inserir nova lista de contatos </h2>
        <form method="post" action="/api/addlist">
            @csrf
            <input id="user_list" name="list_user" value="{{ \Illuminate\Support\Facades\Auth::id() }}" hidden >
            <label for="list_name"> Nome da lista </label>
            <input id="list_name" name="list_name" placeholder="Escola, trabalho..." required />
            <br><br>
            <button class="btn waves-effect waves-light" type="submit" name="action">Salvar e inserir os contatos
                <i class="material-icons right">send</i>
            </button>
        </form>
    </div>
@endsection

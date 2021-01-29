@extends('.base_templates/base')

@section('scripts')
    <script type="text/javascript">
        $(function (){
            var addDiv = $('#addinput');
            var i = $('#addinput p').length + 1;

            $('body').delegate('#remNew','click', function() {
                if( i > 2 ) {
                    $(this).parents('p').remove();
                    i--;
                }
                return false;
            });

            $('#addNew').on('click', function() {
                $('<p class="cyan lighten-5" name="contact'+ i +'">' +
                    '<label class="brown-text" for="c_name'+ i +'">Nome</label>'+
                    '<input type="text" id="c_name'+ i +'" size="60" name="c_name" value="" placeholder="Inserir o nome do contato" required />'+

                    '<label class="brown-text" for="c_cpf'+ i +'">CPF</label>'+
                        '<input type="text" id="c_cpf'+ i +'" size="11" name="c_cpf'+ i +'" value="" placeholder="Inserir cpf" required />'+

                    '<label class="brown-text" for="c_phone'+ i +'">Telefone</label>'+
                        '<input type="text" id="c_phone'+ i +'" size="11" name="c_phone'+ i +'" value="" placeholder="Inserir telefone" required />'+

                    '<label class="brown-text" for="c_status'+ i +'">Status</label>'+
                        '<select id="c_status'+ i +'" name="c_status'+ i +'" class="form-select">'+
                            '<option value="" disabled selected>Escolha o status</option>'+
                            '<option value="1"> A </option>'+
                            '<option value="2"> B </option>'+
                            '<option value="3"> C </option>'+
                        '</select>' +
                    '<br>'+
                    '<a class="waves-effect black-text" href="#" id="remNew">Remover <i class="fas fa-trash red-text"> </i></a>'
                +'</p>').appendTo(addDiv);
                i++;
                return false;
            });


        });
    </script>
@endsection

@section('content')
    <div class="container">
        <div class="card col">
            <div  class="card-header center">
                <h4> Inserir contatos em "{{$context["list_name"]}}" </h4>
                <br>
                <a href="#" class="black-text" id="addNew">Adicionar <i class="fas fa-plus teal-text"></i></a>

            </div>
            <form id="contact_form" class="container" action="/api/addcontacts" method="post">
                @csrf
                <input hidden name="list_id" value="{{$context["list_id"]}}">
                <div id="addinput" style="padding-top: 10px">
                    <p class="cyan lighten-5" name="contact">
                        <label class="brown-text" for="c_name">Nome</label>
                        <input type="text" id="c_name" size="60" name="c_name" value="" placeholder="Inserir um contato" required />

                        <label class="brown-text" for="c_cpf">CPF</label>
                        <input type="text" id="c_cpf" size="11" name="c_cpf" value="" placeholder="Inserir um contato" required />

                        <label class="brown-text" for="c_phone">Telefone</label>
                        <input type="text" id="c_phone" size="11" name="c_phone" value="" placeholder="Inserir um contato" required />

                        <label class="brown-text" for="c_status">Status</label>
                            <select id="c_status" name="c_status" class="form-select">
                                <option value="" disabled selected>Escolha o status</option>
                                <option value="0"> A </option>
                                <option value="1"> B </option>
                                <option value="2"> C </option>
                            </select>
                        <br>
                    </p>
                </div>

                <div class="card-footer center" style="padding: 20px">
                    <button class="btn waves-effect waves-light" type="submit" name="action"> Submeter </button>
                </div>
            </form>
        </div>
    </div>

@endsection

<x-layout title="Gestão Financeira">


<div class="container-fluid">
<div class="row">
   @include('partials.navbar')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <h2>Planilha de Gestão Financeira: Controle de Despesas</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th>Data</th>
                    <th>Local Visitado</th>
                    <th>Quantidade Gasta</th>
                    <th>Quem gastou</th>
                    <th class="text-center" >Ações</th>
                </tr>
                </thead>
                @foreach($saidas as $saida)
                    <tr>

                        <td>{{$saida->getDataFormatada()}}</td>
                        <td>{{$saida->local_visitado}}</td>
                        <td>{{$saida->getPrecoFormatado()}}</td>
                        <td>{{$saida->pagador}}</td>
                        <td class="text-center">
                            <a href="#" class="btn btn-outline-primary">Editar</a>

                            <a href="{{route('saidas.destroy',$saida->id)}}" class="btn btn-outline-danger">Remover</a>
                        </td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <a class="btn btn-outline-success" href="{{route('saidas.create')}}">Adicionar</a>
        </div>
    </main>
</div>
</div>
</x-layout>

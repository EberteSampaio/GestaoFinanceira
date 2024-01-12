<x-layout title="Registrar Gastos">
    <div class="container-fluid">
        <div class="row">

            @include('partials.navbar')

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <div class="container">
                    <h1 class="my-4">Registro de Gastos</h1>
                    <form action="{{route('saidas.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="data_saida">Data de Saída</label>
                            <input type="date" name="data_saida" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Local Visitado</label>
                            <input type="text" class="form-control" id="local_visitado" name="local_visitado" required>
                        </div>
                        <div class="mb-3">
                            <label for="quantidade_gasta" class="form-label">Quantidade Gasta</label>
                            <input type="number" min="0" step="0.01" class="form-control" id="quantidade_gasta" name="quantidade_gasta" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Pagador</label>
                            <input type="text" class="form-control" id="pagador" name="pagador" required>
                            <div id="passwordHelpBlock" class="form-text">
                                Caso tenha mais de um pagador, registre separadamente.
                            </div>
                        </div>
                        <input type="submit" value="Registrar" class="btn btn-success">
                    </form>
                </div>
            </main>
        </div>
    </div>
</x-layout>


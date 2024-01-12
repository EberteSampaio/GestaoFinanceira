<?php

namespace App\Http\Controllers;

use App\Models\Saidas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use \Exception;

class SaidasController extends Controller
{

    public function index()
    {

        try {
            $saidas = Saidas::query()->orderBy('data_saida')->get();

            return view('home', compact('saidas'));
        }catch (\Exception $e){
            return  response()->json(['error'=>'Erro ao exibir as informações da página. Detalhe: '.$e->getMessage()],500);
        }

    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        try {
            //dd($request->input('quantidade_gasta'));

            $regras = [
                'data_saida' => ['required'],
                'local_visitado' => 'required|string',
                'quantidade_gasta' => 'required|numeric|min:0',
                'pagador' => 'required|string'
            ];

            $msgErro = [
                'data_saida.required' => 'É necessário especificar a data.',
                'local_visitado.required' => 'É necessário especificar o local visitado.',
                'quantidade_gasta.required' => 'É necessário especificar o local visitado.',
                'quantidade_gasta.numeric' => 'É necessário que o campo de valor gasto no passeio seja númerico.',
                'quantidade_gasta.min' => 'É necessário que o campo de valor gasto seja maior que R$ 0.',
                'pagador.required' => 'É necessário especificar o pagador do passeio.'
            ];

            $request->validate($regras, $msgErro);

            $newSaida = new Saidas([
                'data_saida' => $request->input('data_saida'),
                'local_visitado' => $request->input('local_visitado'),
                'valor_gasto' => $request->input('quantidade_gasta'),
                'pagador' => $request->input('pagador')
            ]);

            $newSaida->save();

            return redirect('/');
        }catch (\Exception $e){
            return response()->json(['error'=>'Erro ao registrar as informações. Detalhes: '.$e->getMessage()],500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            if(!Saidas::destroy($id)){
                throw new Exception('Erro ao remover item. Verifique a conexão com o banco de dados');
            }

            return redirect()->route('saidas.index',['sucess'=>'Item excluido com sucesso.']);
        }catch (Exception $e){
            return redirect('saidas.index',['error'=>'Erro ao excluir a saída. Detalhe: ' . $e->getMessage()]);
        }
    }
}

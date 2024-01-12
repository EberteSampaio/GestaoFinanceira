<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saidas extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'controle_saidas';
    protected $fillable =[
        'data_saida',
        'local_visitado',
        'valor_gasto',
        'pagador'
    ];

    public function getPrecoFormatado()
    {
        return 'R$ '.str_replace('.',',',$this->valor_gasto);
    }
    public function getDataFormatada()
    {
        return \Carbon\Carbon::parse($this->data_saida)->format('d/m/Y') ;
    }


}

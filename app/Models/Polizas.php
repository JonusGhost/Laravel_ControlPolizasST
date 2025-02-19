<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Polizas extends Model
{
    use HasFactory;

    protected $fillable = [
        'total_horas', 'fecha_inicio', 'fecha_fin', 'precio', 'id_cliente', 'observaciones'
    ]; 

    public function consumirHoras($horas){
        if ($this->total_horas >= $horas){
            $this->total_horas -= $horas;
            $this->save();
            return true;
        }
        return false;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    //constantes del tipo de envio o entrega
    const RETIRO = 1;
    const ENVIAR = 2;
    //// Constantes del estado de la orden
    const PENDIENTE= 1;
    const RECIBIDO=2;
    const ENVIADO=3;
    const ENTREGADO=4;
    const ANULADO=5;
    
    public function facdetalle()
    {
      return $this->hasMany(FacDetalle::class);
    }
    
    public function provincia()
    {
      return $this->belongsTo(Provincia::class);
    }
    
    public function ciudad()
    {
      return $this->belongsTo(Ciudad::class);
    }
    
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}

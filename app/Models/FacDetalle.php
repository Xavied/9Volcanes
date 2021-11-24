<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacDetalle extends Model
{
    use HasFactory;
    public function facencabezado()
    {
      return $this->belongsTo(FacEncab::class);
    }
    public function orden()
    {
      return $this->belongsTo(Orden::class);
    }
    public function producto()
    {
      return $this->belongsTo(Producto::class);
    }
}

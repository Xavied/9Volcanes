<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacEncab extends Model
{
    use HasFactory;
    public function facdetalle()
    {
      return $this->hasMany(FacDetalle::class);
    }
    public function clientes()
    {
      return $this->belongsTo(Clientes::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre', 'costo', 'provincia_id'];

    public function provincia()
    {
      return $this->belongsTo(Provincia::class);
    }
    public function ordenes()
    {
      return $this->hasMany(Orden::class);
    }
}

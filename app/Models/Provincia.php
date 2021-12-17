<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre'];
    
    public function ciudades()
    {
      return $this->hasMany(Ciudad::class);
    }
    public function ordenes()
    {
      return $this->hasMany(Orden::class);
    }
}

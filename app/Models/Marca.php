<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function productos()
    {
      return $this->hasMany(Producto::class);
    }
    public function Imagenes()
    {
      return $this->morphMany(Imagenes::class, 'imageable');
    }
}

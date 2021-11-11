<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

  public function categoria()
  {
    return $this->belongsTo(Categoria::class);
  }
  public function marca()
  {
    return $this->belongsTo(Marca::class);
  }
  public function Imagenes()
  {
    return $this->morphMany(Imagenes::class, 'imageable');
  }

  public function getGetNombreAttribute($key)
  {
    //return substr ($this->nombre, 20);
    return substr($this->nombre, 0, 20);
  }

  public function scopeBuscarpor($query, $buscar) {
        
    //return $query->where('nombre','like',"%$buscar%")->orWhere('descripcion','like',"%$buscar%");
    return $query->where('nombre','like',"%$buscar%");

}
}

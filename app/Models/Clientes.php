<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'created_at', 'updated_at'];
    public function facencab()
    {
      return $this->hasMany(FacEncab::class);
    }
}

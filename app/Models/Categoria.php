<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $table = 'categorias';

    protected $fillable = ['nome', 'pai_id'];


    public function subcategorias()
    {
        return $this->hasMany(Categoria::class, 'pai_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(Categoria::class, 'pai_id', 'id');
    }


}

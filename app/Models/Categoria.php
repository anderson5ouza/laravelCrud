<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['categoria','descricao'];

    public function produtos(){
        return $this->hasMany('App\Models\Produto');
    }

    protected static function booted () {
        
        static::deleting(function(Categoria $categoria) {
             $categoria->produtos()->delete();
        });
    }
}

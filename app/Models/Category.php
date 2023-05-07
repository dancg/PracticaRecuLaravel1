<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'descripcion'];
    //Relacion 1:N con Película, en este caso hasMany
    public function peliculas() :HasMany{
        return $this->hasMany(Pelicula::class);
    }
}

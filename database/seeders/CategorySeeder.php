<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            "Accion"=>"Es una película del género Acción",
            "Drama"=>"Es una película del género Drama",
            "Comedia"=>"Es una película del género Comedia",
            "Documental"=>"Es una película del género Documental",
        ];

        foreach($categorias as $n=>$v){
            Category::create([
                "nombre"=>$n,
                "descripcion"=>$v
            ]);          
        };
    }
}

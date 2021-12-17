<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provincia;
use App\Models\Ciudad;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Provincia::create(['nombre' => 'Azuay']);
        Provincia::create(['nombre' => 'Bolivar']);
        Provincia::create(['nombre' => 'Cañar']);
        Provincia::create(['nombre' => 'Carchi']);
        Provincia::create(['nombre' => 'Chimborazo']);
        Provincia::create(['nombre' => 'Cotopaxi']);
        Provincia::create(['nombre' => 'El Oro']);
        Provincia::create(['nombre' => 'Esmeralda']);
        Provincia::create(['nombre' => 'Galápagos']);
        Provincia::create(['nombre' => 'Guayas']);
        Provincia::create(['nombre' => 'Imbabura']);
        Provincia::create(['nombre' => 'Loja']);
        Provincia::create(['nombre' => 'Los Ríos']);
        Provincia::create(['nombre' => 'Manabí']);
        Provincia::create(['nombre' => 'Morona Santiago']);
        Provincia::create(['nombre' => 'Napo']);
        Provincia::create(['nombre' => 'Orellana']);
        Provincia::create(['nombre' => 'Pastaza']);
        Provincia::create(['nombre' => 'Pichincha']);
        Provincia::create(['nombre' => 'Santa Elena']);
        Provincia::create(['nombre' => 'Santo Domingo de los Tsáchilas']);
        Provincia::create(['nombre' => 'Sucumbios']);
        Provincia::create(['nombre' => 'Tungurahua']);
        Provincia::create(['nombre' => 'Zamora Chinchipe']);
        
        $provincias = Provincia::all();
        
        foreach ($provincias as $provincia) {
          $ciudad = Ciudad::create([
            'provincia_id' => $provincia->id,
            'nombre' => $provincia->nombre . ' capital',
            'costo' => 4.99,
          ]);
        }
    }
}

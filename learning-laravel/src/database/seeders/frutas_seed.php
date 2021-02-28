<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class frutas_seed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i< 20;$i++){
            DB::table('frutas')->insert(array(
                'nombre' => 'Cereza '.$i,
                'descripcion' => 'descripcion de la cereza '. $i,
            ));
        }
        $this->command->info('The table frutas has been inserted');
    }
}

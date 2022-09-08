<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cuenta;

class CuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuenta = new Cuenta();
        $cuenta->user_id = 1;
        $cuenta->saldo = 400000;
        $cuenta->activo = true;
        $cuenta->nombre = 'Caja Social';
        $cuenta->save();

        $cuenta2 = new Cuenta();
        $cuenta2->user_id = 1;
        $cuenta2->saldo = 600000;
        $cuenta2->activo = false;
        $cuenta2->nombre = 'Banco Bogota';
        $cuenta2->save();
    }
}

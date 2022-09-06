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
        $cuenta->nombre = 'Caja Social';
        $cuenta->save();
    }
}

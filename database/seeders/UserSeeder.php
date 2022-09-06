<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->nombre = 'Carolina Pinto';
        $usuario->email = 'carol.pinto.lopez@gmail.com';
        $usuario->password = Hash::make('0000');
        $usuario->save();
    }
}

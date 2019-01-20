<?php

use Illuminate\Database\Seeder;
use App\Persona;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $persona = new Persona;
        $persona->nombre = 'Josue Bravo';
        $persona->tipo_documento = 'DNI';
        $persona->num_documento = '72251322';
        $persona->email = 'josuebh62@gmail.com';
        $persona->save();

        $user = new User;
        $user->id = 1;
        $user->usuario = 'jbravo';
        $user->password = bcrypt('123456');
        $user->idrol = 1;
        $user->save();
    }
}

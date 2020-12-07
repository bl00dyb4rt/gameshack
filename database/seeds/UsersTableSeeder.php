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
        $persona->nombre = 'b4rt';
        $persona->tipo_documento = 'DNI';
        $persona->num_documento = '90909090';
        $persona->email = 'b4rt@admin.com';
        $persona->save();

        $user = new User;
        $user->id = 1;
        $user->usuario = 'b4rt';
        $user->password = bcrypt('123456');
        $user->idrol = 1;
        $user->save();
    }
}

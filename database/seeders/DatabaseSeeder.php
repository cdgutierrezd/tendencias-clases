<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Cliente;
use App\Models\TipoUsuario;
use App\Models\Usuario;
use App\Models\Ticket;
use App\Models\Comentario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear tipos de usuario primero
        TipoUsuario::factory(5)->create();

        // Crear usuarios (dependen de tipo_usuario)
        Usuario::factory(10)->create();

        // Crear clientes
        Cliente::factory(20)->create();

        // Crear tickets (dependen de cliente y usuario)
        Ticket::factory(50)->create();

        // Crear comentarios (dependen de ticket y usuario)
        Comentario::factory(100)->create();

        // Crear usuarios de Laravel (opcional)
        User::factory(5)->create();

         /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}

       

    


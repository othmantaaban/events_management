<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Collaborateur;
use App\Models\Entreprise;
use App\Models\User;

class CollaborateurDemoSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();
        $entreprise = Entreprise::first();
        Collaborateur::updateOrCreate([
        ], [
            'id_user' => $user->id_user,
            'id_entreprise' => $entreprise->id_entreprise,
            'role' => 'admin_entreprise',
            'active' => true,
        ]);
    }
}

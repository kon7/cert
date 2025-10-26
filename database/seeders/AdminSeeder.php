<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use App\Models\Groupe;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Liste des rôles à créer
        $roles = [
             ['libelle' => 'Admin', 'description' => 'Rôle administrateur avec tous les droits'],
             ['libelle' => 'Alerte', 'description' => 'Rôle pour la gestion des bulletins de sécurité'],
             ['libelle' => 'Incident', 'description' => 'Rôle pour la gestion des incidents'],
             ['libelle' => 'Flux', 'description' => 'Rôle pour la gestion des flux et des API externes'],
        ];

        // Créer ou récupérer les rôles
        $roleIds = [];
        foreach ($roles as $data) {
            $role = Role::firstOrCreate(
                ['libelle' => $data['libelle']],
                ['description' => $data['description']]
            );
            $roleIds[] = $role->id;
        }

        // Créer le groupe "Administration"
        $groupeAdmin = Groupe::firstOrCreate(
            ['libelle' => 'Administration'],
            ['description' => 'Groupe des administrateurs du système']
        );

        // Lier tous les rôles au groupe "Administration" (sans doublons)
        $groupeAdmin->roles()->syncWithoutDetaching($roleIds);

        // Créer l’utilisateur admin
        $utilisateurAdmin = Utilisateur::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'matricule' => 'ADM001',
                'nom' => 'Admin',
                'prenom' => 'Système',
                'password' => Hash::make('admin123'),
            ]
        );

        // Lier l’utilisateur au groupe "Administration"
        $utilisateurAdmin->groupes()->syncWithoutDetaching([$groupeAdmin->id]);

        $this->command->info('Utilisateur admin, groupe et rôles configurés avec succès.');
    }
    
}

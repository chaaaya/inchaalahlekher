<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class MigrateUsersToNewTables extends Migration
{
    public function up()
    {
        // Migrer les clients
        DB::table('users')->where('role', 'client')->chunkById(100, function ($users) {
            foreach ($users as $user) {
                DB::table('clients')->insert([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'numero_telephone' => $user->numero_telephone,
                    'subscription' => $user->subscription,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ]);
            }
        });

        // Migrer les responsables
        DB::table('users')->where('role', 'responsable')->chunkById(100, function ($users) {
            foreach ($users as $user) {
                DB::table('responsables')->insert([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'numero_telephone' => $user->numero_telephone,
                    'subscription' => $user->subscription,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ]);
            }
        });

        // Migrer les admins
        DB::table('users')->where('role', 'admin')->chunkById(100, function ($users) {
            foreach ($users as $user) {
                DB::table('admins')->insert([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'numero_telephone' => $user->numero_telephone,
                    'subscription' => $user->subscription,
                    'created_at' => $user->created_at,
                    'updated_at' => $user->updated_at,
                ]);
            }
        });

        // Optionnel: Supprimer les utilisateurs migrés de la table users
        DB::table('users')->whereIn('role', ['client', 'responsable', 'admin'])->delete();
    }

    public function down()
    {
        // Revenir en arrière n'est pas trivial ici et n'est pas fourni
    }
}

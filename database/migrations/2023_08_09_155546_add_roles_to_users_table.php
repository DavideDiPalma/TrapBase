<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_admin')->after('email')->nullable()->defaultValue(false);
            $table->boolean('is_artist')->after('is_admin')->nullable()->defaultValue(false);
        });

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@trapbase.com',
            'password' => 'trapbase12345678',
            'is_admin' => true

        ]);
            

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        User::where('email', 'admin@trapbase.com')->delete();

        Schema::table('users', function (Blueprint $table) {
        
        $table->dropColumn(['is_admin' , 'is_artist']);

        // L'admin potrà accettare la richietsa di diventare artista
        // L'artista potrà accedere al CRUD, ma non avrà potere sull'user


        });
    }
};

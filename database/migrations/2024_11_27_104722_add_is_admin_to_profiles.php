<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->boolean('is_admin')->after('user_id')->default(false);
        });

        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@soundstorm.it',
            'password' => bcrypt('12345678'),
        ]);

        $user->profile()->create([
            'is_admin' => true,
        ]);
    }

    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });

        $admin = User::where('email', 'admin@soundstorm.it')->first();
        if ($admin) {
            $admin->profile()->delete();
            $admin->delete();
        }
    }
};

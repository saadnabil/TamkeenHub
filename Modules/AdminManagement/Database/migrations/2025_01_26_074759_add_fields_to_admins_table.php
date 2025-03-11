<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('remember_token')->nullable();
            $table->string('verification_code')->nullable();
            $table->string('email')->unique()->change();
        });

        DB::table('admins')->insert([
            [
                'name' => 'Super Admin',
                'email' => 'm2@yahoo.com',
                'password' => Hash::make('admin123'),
                'remember_token' => null,
                'verification_code' => null,
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->dropColumn(['remember_token', 'verification_code']);
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('address')->nullable();
            $table->json('phones')->nullable();
            $table->json('social_media')->nullable();
            $table->string('long')->nullable();
            $table->string('lat')->nullable();
            $table->timestamps();
        });


        DB::table('settings')->insert([
            'title' => json_encode(['en' => 'My Website', 'ar' => 'Mon Site Web']),
            'address' => json_encode(['en' => '123 Main St', 'ar' => '123 Rue Principale']),
            'phones' => json_encode(['+123456789', '+987654321']),
            'social_media' => json_encode(['facebook' => 'https://facebook.com', 'twitter' => 'https://twitter.com']),
            'long' => '123.456',
            'lat' => '78.910',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

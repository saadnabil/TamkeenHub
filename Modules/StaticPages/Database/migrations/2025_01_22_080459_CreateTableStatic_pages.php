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
        Schema::create('static_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->index();
            $table->json('title');
            $table->json('text');
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // Insert static data
        DB::table('static_pages')->insert([
            [
                'name' => 'about_us',
                'title' => json_encode(['en' => 'About Us', 'ar' => 'من نحن']),
                'text' => json_encode(['en' => 'About us content...', 'ar' => 'محتوى من نحن...']),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'vision',
                'title' => json_encode(['en' => 'vision', 'ar' => 'رؤيتنا']),
                'text' => json_encode(['en' => 'vision content...', 'ar' => 'محتوى رؤيتنا']),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'mission',
                'title' => json_encode(['en' => 'Mission', 'ar' => 'مهمتنا']),
                'text' => json_encode(['en' => 'Mission content...', 'ar' => 'محتوى مهمتنا']),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'terms_and_conditions',
                'title' => json_encode(['en' => 'Terms and Conditions', 'ar' => 'الشروط والقواعد']),
                'text' => json_encode(['en' => 'Terms and Conditions content...', 'ar' => 'محتوى الشروط والقواعد']),
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

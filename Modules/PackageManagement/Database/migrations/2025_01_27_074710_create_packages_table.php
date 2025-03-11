<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->double('price_annual')->nullable();
            $table->double('price_monthly')->nullable();
            $table->double('discount_annual')->default(0);
            $table->double('discount_monthly')->default(0);
            $table->tinyinteger('active_status')->default(1);
            $table->tinyinteger('bordered_status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};

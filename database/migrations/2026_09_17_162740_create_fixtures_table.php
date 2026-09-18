<?php

use App\RugbyType;
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
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->enum('type', RugbyType::cases())->index();
            $table->string('opposition');
            $table->string('location');
            $table->dateTime('start');
            $table->text('report')->nullable();
            $table->unsignedInteger('hurricanes_score')->nullable();
            $table->unsignedInteger('opposition_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fixtures');
    }
};

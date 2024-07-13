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
        Schema::create('myerrors', function (Blueprint $table) {
            $table->id();
            $table->longText('details')->nullable();
            $table->string('appindex', 50)->nullable();
            $table->text('type')->nullable();
            $table->tinyInteger('st')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myerrors');
    }
};

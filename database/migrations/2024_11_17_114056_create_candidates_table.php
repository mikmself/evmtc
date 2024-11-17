<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('vision');
            $table->text('mission');
            $table->string('motto');
            $table->string('photo');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('candidates');
    }
};

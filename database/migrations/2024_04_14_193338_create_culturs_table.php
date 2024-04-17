<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    public function up(): void {
        Schema::create('culturs', function (Blueprint $table) {
            $table->id();
            $table->string('cultur_name');
            $table->date('datePlanting')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('culturs');
    }
};

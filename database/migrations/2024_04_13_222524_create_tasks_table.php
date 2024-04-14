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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('Description');
            $table->string('DateStart');
            $table->string('DateEnd');
            $table->string('Status')->default(\App\Enums\TaskStatus::PENDING->value);
            $table->string('TypeTask')->default(\App\Enums\TaskType::TRAITEMENT->value);
            $table->foreignId("employee_id")->constrained("employees");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};

<?php

use App\Enums\TaskType;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->enum('TypeTask', TaskType::getValues())->nullable();
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

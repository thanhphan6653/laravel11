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
        Schema::create('employee', function (Blueprint $table) {
            $table->increments('id_employee');
            $table->string('employee_name', 255);
            $table->text('address');
            $table->decimal('salary', 10, 2)->nullable();
            $table->boolean('gender');
            $table->date('date_of_birth');
            $table->date('join_date');
            $table->unsignedInteger('id_employee_manager');
            $table->unsignedInteger('id_department');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};

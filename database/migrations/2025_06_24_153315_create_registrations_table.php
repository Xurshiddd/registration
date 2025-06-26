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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone');
            $table->string('phone_2')->nullable();
            $table->date('birth_date');
            $table->boolean('gender')->default(true); // true erkak false ayol
            $table->string('avatar');
            $table->string('passport_series');
            $table->string('passport_number');
            $table->string('passport_pdf');
            $table->enum('education',['school', 'college'])->default('school');
            $table->string('diploma_series');
            $table->string('diploma_number');
            $table->string('diploma_pdf');
            $table->enum('education_livel', ['bachelor', 'master'])->default('bachelor');
            $table->string('course_direction');
            $table->string('educate_direction');
            $table->string('passport_rus')->nullable();
            $table->string('propiska')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};

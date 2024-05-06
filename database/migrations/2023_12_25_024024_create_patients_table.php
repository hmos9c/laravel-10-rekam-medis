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
        Schema::create('patients', function (Blueprint $table) {
            $table->id('id_patient');
            $table->foreignId('gender_id')->constrained('genders');
            $table->foreignId('religion_id')->constrained('religions');
            $table->foreignId('status_id')->constrained('statuses');
            $table->foreignId('nationality_id')->constrained('nationalities');
            $table->string('name');
            $table->string('city');
            $table->date('dateofbirth');
            $table->string('address');
            $table->string('job')->nullable();
            $table->string('phonenumber');
            $table->string('email')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

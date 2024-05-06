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
        Schema::create('records', function (Blueprint $table) {
            $table->id('id_record');
            $table->foreignId('patient_id')->constrained('patients');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreignId('drug_id')->constrained('drugs');
            $table->foreignId('bed_id')->constrained('beds');
            $table->foreignId('care_id')->constrained('cares');
            $table->text('diagnosis')->nullable();
            $table->string('allergy')->nullable();
            $table->text('description')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->text('operation')->nullable();
            $table->date('dateofentry')->nullable();
            $table->date('outdate')->nullable();
            $table->string('blood')->nullable();
            $table->string('tension')->nullable();
            $table->string('hospital')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};

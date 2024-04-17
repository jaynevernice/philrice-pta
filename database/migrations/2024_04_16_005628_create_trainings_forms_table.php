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
        Schema::create('trainings_forms', function (Blueprint $table) {
            // Section 2
            $table->id();
            $table->integer('encoder_id');
            $table->string('division');
            $table->string('title');
            $table->string('category');
            $table->string('type');
            $table->string('training_venue');
            $table->integer('station_id');
            $table->string('municipality');
            $table->string('province');
            $table->string('international_address');
            $table->string('mod');
            $table->date('start_date');
            $table->date('end_date');
            // Section 3
            $table->string('sponsor');
            $table->string('fund');
            $table->float('average_gik');
            $table->float('evaluation');
            // Section 4
            $table->integer('num_of_participants');
            $table->integer('num_of_farmers');
            $table->integer('num_of_extworkers');
            $table->integer('num_of_scientific');
            $table->integer('num_of_other');
            $table->integer('num_of_male');
            $table->integer('num_of_female');
            $table->integer('num_of_indigenous');
            $table->integer('num_of_pwd');
            // Section 5 
            $table->string('image');
            $table->string('file');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings_forms');
    }
};

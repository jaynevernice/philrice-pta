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
            $table->id();
            $table->string('encoder_name');
            $table->string('encoder_email');
            $table->string('division');
            $table->string('title');
            $table->string('training_type');
            $table->string('training_style');
            $table->dateTime('start_date')->index();
            $table->dateTime('end_date')->index();
            $table->string('venue');
            $table->string('province');
            $table->string('municipality');
            $table->string('country');
            $table->string('state');
            $table->string('sponsor');
            $table->string('fund');
            $table->string('average_gik');
            $table->string('evaluation');
            $table->string('participants');
            $table->string('num_of_participants');
            $table->string('num_of_farmers');
            $table->string('num_of_extworkers');
            $table->string('num_of_scientific');
            $table->string('num_of_other_sectors');
            $table->string('num_of_male');
            $table->string('num_of_female');
            $table->string('num_of_indigenous');
            $table->string('num_of_pwd');
            $table->string('image')->nullable();
            $table->string('file')->nullable();
            
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

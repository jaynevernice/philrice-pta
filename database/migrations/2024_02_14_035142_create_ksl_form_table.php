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
        Schema::create('ksl_form', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('email')->nullable();
            $table->string('staff_name')->nullable();
            $table->string('age_group')->nullable();
            $table->string('sex')->nullable();
            
            $table->integer('offices_divisions')->nullable(); // foreign key from offices_divisions table
            // $table->unsignedBigInteger('offices_divisions_id')->nullable();
            // $table->foreign('offices_divisions_id')->references('id')->on('offices_divisions');

            $table->string('mode_of_sharing')->nullable();
            $table->string('opportunity')->nullable();
            $table->string('activity')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('event_organizer')->nullable();
            $table->string('sponsor')->nullable();
            $table->string('venue')->nullable();
            $table->string('province')->nullable();
            $table->string('municipality')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->date('interview_date')->nullable();
            $table->string('agency')->nullable();
            $table->string('program_title')->nullable();
            $table->string('scope')->nullable();
            $table->string('inquiry')->nullable();
            $table->string('inquiry_date')->nullable();
            $table->string('topic')->nullable();
            $table->string('presentation_title')->nullable();
            $table->string('classification')->nullable();
            $table->integer('total_participants')->nullable();
            $table->integer('total_farmers')->nullable();
            $table->integer('total_workers')->nullable();
            $table->integer('total_sciecom')->nullable();
            $table->integer('total_others')->nullable();
            $table->integer('total_male')->nullable();
            $table->integer('total_female')->nullable();
            $table->integer('total_indigenous')->nullable();
            $table->integer('total_pwd')->nullable();
            $table->string('photo_docu')->nullable();
            $table->string('other_docu')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ksl_form');
    }
};

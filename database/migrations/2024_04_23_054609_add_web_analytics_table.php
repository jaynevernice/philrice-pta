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
        Schema::create('web_analytics', function (Blueprint $table) {
            $table->id();
            // $table->string('visitor_view_count');
            $table->string('name');
            $table->string('sector');
            $table->string('purpose')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_analytics');   
    }
};

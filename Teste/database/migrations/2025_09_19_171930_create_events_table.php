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
        Schema::create('events', function (Blueprint $table) {
            $table->integer('id', true)->primary()->autoIncrement();
            $table->string('name', 30);
            $table->integer('capacity_ticket');
            $table->date('date_event');
            $table->time('time_event');
            $table->string('endereco_event', 120);
            $table->string('img_event', 150);
            $table->integer('limit_ticket')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};

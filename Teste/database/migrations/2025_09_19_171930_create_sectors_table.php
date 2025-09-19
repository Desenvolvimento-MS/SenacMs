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
        Schema::create('sectors', function (Blueprint $table) {
          $table->integer('id', true)->primary()->autoIncrement();
            $table->string('name', 20);
            $table->integer('capacity_ticket');
            $table->integer('ticket_reserved');
            $table->enum('type_sector', ['VIP', 'IMP', 'COM'])->nullable();
            $table->integer('event_id')->index('event_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sectors');
    }
};

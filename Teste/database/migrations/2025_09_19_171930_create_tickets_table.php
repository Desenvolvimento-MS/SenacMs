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
        Schema::create('tickets', function (Blueprint $table) {
          $table->integer('id', true)->primary()->autoIncrement();
            $table->char('code_ticket', 12);
            $table->dateTime('time_validation');
            $table->enum('status_ticket', ['Emitido', 'Validado'])->nullable();
            $table->integer('client_id')->index('client_id');
            $table->integer('sale_id')->index('sale_id');
            $table->integer('sector_id')->index('sector_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};

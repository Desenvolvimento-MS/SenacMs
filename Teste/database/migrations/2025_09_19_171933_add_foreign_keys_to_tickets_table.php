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
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign(['client_id'], 'tickets_ibfk_1')->references(['id'])->on('clients')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['sale_id'], 'tickets_ibfk_2')->references(['id'])->on('sales')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign(['sector_id'], 'tickets_ibfk_3')->references(['id'])->on('sectors')->onUpdate('restrict')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign('tickets_ibfk_1');
            $table->dropForeign('tickets_ibfk_2');
            $table->dropForeign('tickets_ibfk_3');
        });
    }
};

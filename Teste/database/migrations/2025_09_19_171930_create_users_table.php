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
        Schema::create('users', function (Blueprint $table) {
           $table->integer('id', true)->primary()->autoIncrement();
            $table->string('name', 30);
            $table->string('lastname', 50);
            $table->string('email', 60)->unique('email');
            $table->char('cpf', 11)->unique('cpf');
            $table->enum('profile', ['Adm', 'Saller', 'Check'])->nullable();
            $table->string('password', 200);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

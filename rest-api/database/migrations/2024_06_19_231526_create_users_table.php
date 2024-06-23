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
            $table->id();
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('role_id');
            $table->string('name',80);
            $table->string('surname',80);
            $table->string('username',20)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->foreign('store_id')->references('id')->on('stores');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->softDeletes();
            $table->timestamps();
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

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
        Schema::create('user_list', function (Blueprint $table) {
        $table->id('user_id')->length(10);
        $table->string('user_username');
        $table->string('user_email');
        $table->string('password');
        $table->string('user_access_rights', 50);
        $table->string('user_status', 50)->default('inactive');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_list');
    }
};

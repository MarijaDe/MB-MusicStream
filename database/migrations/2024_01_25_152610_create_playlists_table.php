<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Disable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=0');

    // Rest of your migration code

    // Enable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Schema::create('playlists', function (Blueprint $table) {
            $table->id('playlist_id');
            $table->string('name');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('user_id')->on('users');
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Disable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=0');

    Schema::dropIfExists('playlists');

    // Enable foreign key checks
    DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
};

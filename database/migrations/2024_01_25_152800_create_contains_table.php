<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // In the contains migration file (2024_01_25_152800_create_contains_table.php)
public function up(): void
{
    Schema::create('contains', function (Blueprint $table) {
        $table->id('contains_id');
        $table->unsignedBigInteger('playlist_id');
        $table->unsignedBigInteger('song_id');
        $table->foreign('playlist_id')->references('playlist_id')->on('playlists')->onDelete('cascade');
        $table->foreign('song_id')->references('song_id')->on('songs')->onDelete('cascade');
        $table->timestamps();
    });
}

public function down(): void
{
    // Comment or remove the following lines to avoid errors during rollback
    // Schema::table('contains', function (Blueprint $table) {
    //     $table->dropForeign(['playlist_id']);
    //     $table->dropForeign(['song_id']);
    // });

    Schema::dropIfExists('contains');
}

};

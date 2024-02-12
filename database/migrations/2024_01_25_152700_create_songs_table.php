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
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('song_id');
            $table->string('title');
            $table->string('song_genre');
            $table->integer('song_length');
            $table->date('song_release_date')->default(now());
            $table->string('image');
            $table->string('audio_url');
        
            $table->unsignedBigInteger('artist_id');
            $table->unsignedBigInteger('album_id');
        
            $table->foreign('artist_id')
                ->references('artist_id')->on('artists')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        
            $table->foreign('album_id')
                ->references('album_id')->on('albums')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        
            $table->timestamps();
        });
        
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('songs');
    }
};

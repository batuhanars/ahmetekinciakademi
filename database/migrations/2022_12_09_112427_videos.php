<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("play_list_id")->default(0);
            $table->string("image");
            $table->string("uri");
            $table->string("name");
            $table->string("slug");
            $table->text("description")->nullable();
            $table->string("link");
            $table->string("player_embed_url");
            $table->enum("status", [0, 1]);
            $table->enum("preview", [0, 1]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
};

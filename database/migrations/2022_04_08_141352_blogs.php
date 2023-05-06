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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("help_id")->nullable();
            $table->string("image")->nullable();
            $table->string("title");
            $table->string("slug");
            $table->enum("status", [0, 1]);
            $table->text("spot_text");
            $table->string("seo_description")->nullable();
            $table->string("seo_keywords")->nullable();
            $table->bigInteger("read_count")->default(0);
            $table->longText("content");
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};

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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("document_id")->nullable();
            $table->string("image")->nullable();
            $table->string("title");
            $table->string("slug");
            $table->float("price");
            $table->enum("status", [0, 1]);
            $table->text("description")->nullable();
            $table->longText("content")->nullable();
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
        Schema::dropIfExists('courses');
    }
};

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
        Schema::create('customer_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("course_id");
            $table->unsignedBigInteger("video_id");
            $table->integer("status")->default(0);
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
        Schema::dropIfExists('customer_videos');
    }
};

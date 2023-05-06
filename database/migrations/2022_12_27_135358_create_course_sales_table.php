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
        Schema::create('course_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pay_id");
            $table->unsignedBigInteger("course_id");
            $table->unsignedBigInteger("user_id");
            $table->string("course_name");
            $table->string("user_name");
            $table->float("price");

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
        Schema::dropIfExists('course_sales');
    }
};

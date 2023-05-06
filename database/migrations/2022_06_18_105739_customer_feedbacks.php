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
        Schema::create('customer_feedbacks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('customer_id');
            $table->integer("rate")->default(1);
            $table->string("title");
            $table->text("message");
            $table->enum("status", [0, 1]);
            $table->enum("show_homepage", [0, 1]);
            $table->timestamps();

            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade");
            $table->foreign("course_id")->references("id")->on("courses")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_feedbacks');
    }
};

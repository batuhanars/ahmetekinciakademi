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
        Schema::create('footer_menu', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("order");
            $table->string("title", 20);
            $table->string("link");
            $table->integer("open_new_tab");
            $table->enum("status", [0, 1]);
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
        Schema::dropIfExists('footer_menu');
    }
};

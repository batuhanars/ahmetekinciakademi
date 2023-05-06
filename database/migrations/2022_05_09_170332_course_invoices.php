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
        Schema::create('course_invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("invoice_id");
            $table->unsignedBigInteger("course_id");
            $table->string("course_name")->nullable();
            $table->float("price")->nullable();
            $table->timestamps();

            $table->foreign("invoice_id")->references("id")->on("invoices")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_invoices');
    }
};

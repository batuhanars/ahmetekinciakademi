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
        Schema::create('corporate_customer', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->string("company_name")->nullable();
            $table->string("tax_administration")->nullable();
            $table->string("tax_number")->nullable();
            $table->timestamps();

            $table->foreign("customer_id")->references("id")->on("customers")->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('corporate_customer');
    }
};

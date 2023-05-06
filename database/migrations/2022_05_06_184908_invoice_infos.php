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
        Schema::create('invoice_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id")->nullable();
            $table->unsignedBigInteger("pay_id")->nullable();
            $table->string("province")->nullable();
            $table->string("district")->nullable();
            $table->string("fullname")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->string("address")->nullable();
            $table->string("zip")->nullable();
            $table->string("tc_no")->nullable();
            $table->string("company_name")->nullable();
            $table->string("tax_administration")->nullable();
            $table->string("tax_number")->nullable();
            $table->float("subtotal")->nullable();
            $table->float("tax_amount")->nullable();
            $table->float("amount")->nullable();
            $table->float("tax_rate")->default(18);
            $table->enum("status", [0, 1]);
            $table->dateTime("payment_at")->nullable();
            $table->date("due_at")->nullable();
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
        Schema::dropIfExists('invoice_infos');
    }
};

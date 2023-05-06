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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("customer_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("pay_id")->nullable();
            $table->float("subtotal")->nullable();
            $table->float("tax_amount")->nullable();
            $table->float("amount")->nullable();
            $table->float("tax_rate")->default(18);
            $table->enum("status", [0, 1]);
            $table->timestamp("payment_at")->nullable();
            $table->timestamp("due_at")->nullable();
            $table->string("invoice_pdf")->nullable();
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
        Schema::dropIfExists('invoices');
    }
};

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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("province_id")->default(1);
            $table->unsignedBigInteger("district_id")->default(1);
            $table->string("address")->nullable();
            $table->string("zip")->nullable();
            $table->enum("type", ["corporate", "individual"]);
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("province_id")->references("id")->on("provinces");
            $table->foreign("district_id")->references("id")->on("districts");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};

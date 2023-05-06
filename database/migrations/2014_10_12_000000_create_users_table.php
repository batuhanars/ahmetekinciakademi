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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('password');
            $table->enum('membership_type', ["superadmin", "admin", "instructor", "customer"]);
            $table->string("mobile_verify_code")->nullable();
            $table->timestamp("mobile_verification_date")->nullable();
            $table->integer("mobile_verify_status")->nullable();
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
        Schema::dropIfExists('users');
    }
};

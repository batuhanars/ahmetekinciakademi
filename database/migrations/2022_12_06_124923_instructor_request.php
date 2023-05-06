<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *ttttttttttttttttttttttttttttttttttt
     * @return void
     */
    public function up()
    {
        Schema::create('instructor_requests', function (Blueprint $table) {
            $table->id();
            $table->string("fullname")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->date("date_of_birth")->nullable();
            $table->string("education_status")->nullable();
            $table->string("profession")->nullable();
            $table->string("branch")->nullable();
            $table->text("description_1")->nullable();
            $table->text("description_2")->nullable();
            $table->string("instructor_status");
            $table->string("resume");
            $table->enum("status", ["onhold", "approved", "denied"]);
            $table->timestamp("approval_date")->nullable();
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
        Schema::dropIfExists('instructor_requests');
    }
};

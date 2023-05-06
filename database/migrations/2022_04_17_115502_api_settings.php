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
        Schema::create('api_settings', function (Blueprint $table) {
            $table->id();
            $table->text("whatsapp")->nullable();
            $table->text("google_analytics")->nullable();
            $table->text("webmaster_tools")->nullable();
            $table->text("contact_map")->nullable();
            $table->text("live_support")->nullable();
            $table->text("facebook_pixel")->nullable();
            $table->text("tiktok_pixel")->nullable();
            $table->string("shopping_number")->nullable();
            $table->string("shopping_password")->nullable();
            $table->string("shopping_secret_key")->nullable();
            $table->string("username")->nullable();
            $table->string("password")->nullable();
            $table->string("sender_title")->nullable();
            $table->string("client_id")->nullable();
            $table->string("client_secret")->nullable();
            $table->string("access_token")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('api_settings');
    }
};

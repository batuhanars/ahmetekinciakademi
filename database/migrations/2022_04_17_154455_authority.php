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
        Schema::create('authority', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->integer("site_management")->default(1);
            $table->integer("menu_management")->default(1);
            $table->integer("managers")->default(1);
            $table->integer("instructors")->default(1);
            $table->integer("content_management")->default(1);
            $table->integer("customer_management")->default(1);
            $table->integer("multimedia_management")->default(1);
            $table->integer("notification_management")->default(1);
            $table->integer("education_management")->default(1);
            $table->integer("blog_management")->default(1);
            // $table->integer("service_management")->default(1);
            // $table->integer("reference_management")->default(1);
            $table->integer("page_management")->default(1);
            $table->integer("sss_management")->default(1);
            $table->integer("help_management")->default(1);
            // $table->integer("guide_management")->default(1);
            $table->integer("document_management")->default(1);
            $table->integer("sms_management")->default(1);
            $table->integer("sales_management")->default(1);
            $table->integer("integration_management")->default(1);

            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authority');
    }
};

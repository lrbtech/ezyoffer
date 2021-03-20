<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_ads', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('title')->nullable();
            $table->string('price')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('landline')->nullable();
            $table->string('skype')->nullable();
            $table->TEXT('description')->nullable();
            $table->TEXT('address')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('printable')->nullable();
            $table->string('paper_quality')->nullable();
            $table->string('paper_color')->nullable();
            $table->string('paper_other')->nullable();
            $table->string('soft_copy')->nullable();
            $table->string('color_b_w')->nullable();
            $table->string('spring_bind')->nullable();
            $table->string('door_step_delivery')->nullable();
            $table->string('laminated')->nullable();
            $table->string('color')->nullable();
            $table->string('other_color')->nullable();
            $table->string('video_link')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('0');
            $table->string('admin_status')->default('0');
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
        Schema::dropIfExists('post_ads');
    }
}

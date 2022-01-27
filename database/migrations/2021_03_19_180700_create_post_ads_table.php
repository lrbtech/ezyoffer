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
            $table->string('post_type')->nullable();
            $table->string('category')->nullable();
            $table->string('subcategory')->nullable();
            $table->string('title')->nullable();
            $table->string('title_arabic')->nullable();
            $table->string('price')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('landline')->nullable();
            $table->string('skype')->nullable();
            $table->TEXT('description')->nullable();
            $table->TEXT('address')->nullable();
            $table->string('city')->nullable();
            $table->string('area')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('receive_offer')->nullable();
            $table->string('item_conditions')->nullable();
            $table->TEXT('video_link')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('0');
            $table->string('admin_status')->default('0');
            $table->string('package_id')->default('0');
            $table->string('live_ads')->default('0');
            $table->string('live_ads_start_date')->nullable();
            $table->string('live_ads_end_date')->nullable();
            $table->string('view_count')->default('0');
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

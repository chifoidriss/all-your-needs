<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('type_shop_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('email')->after('name')->nullable();
            $table->string('url')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('zip')->nullable();
            $table->boolean('status')->default(false);
            $table->unsignedSmallInteger('boost')->default(0);
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->longText('description')->nullable();
            $table->longText('information')->nullable();
            $table->string('social_url')->nullable();
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
        Schema::dropIfExists('shops');
    }
}

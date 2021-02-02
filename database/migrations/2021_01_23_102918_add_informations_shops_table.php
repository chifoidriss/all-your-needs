<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInformationsShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shops', function (Blueprint $table) {
            // $table->string('email')->after('name')->nullable();
            // $table->string('url')->nullable();
            // $table->string('phone')->nullable();
            // $table->string('fax')->nullable();
            // $table->string('facebook')->nullable();
            // $table->string('twitter')->nullable();
            // $table->string('address')->nullable();
            // $table->string('city')->nullable();
            // $table->string('country')->nullable();
            // $table->string('zip')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

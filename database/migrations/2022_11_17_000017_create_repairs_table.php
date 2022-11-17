<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepairsTable extends Migration
{
    public function up()
    {
        Schema::create('repairs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('start_datetime');
            $table->datetime('end_datetime')->nullable();
            $table->longText('description')->nullable();
            $table->string('model');
            $table->longText('description_to_customer')->nullable();
            $table->longText('internal_description')->nullable();
            $table->longText('accessories')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

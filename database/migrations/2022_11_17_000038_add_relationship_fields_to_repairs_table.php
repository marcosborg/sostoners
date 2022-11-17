<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRepairsTable extends Migration
{
    public function up()
    {
        Schema::table('repairs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_7611725')->references('id')->on('users');
            $table->unsignedBigInteger('crm_customer_id')->nullable();
            $table->foreign('crm_customer_id', 'crm_customer_fk_7611726')->references('id')->on('crm_customers');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id', 'type_fk_7611754')->references('id')->on('types');
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id', 'brand_fk_7611781')->references('id')->on('brands');
            $table->unsignedBigInteger('status_id')->nullable();
            $table->foreign('status_id', 'status_fk_7611791')->references('id')->on('statuses');
        });
    }
}

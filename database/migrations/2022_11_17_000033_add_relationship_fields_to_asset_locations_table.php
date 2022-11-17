<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssetLocationsTable extends Migration
{
    public function up()
    {
        Schema::table('asset_locations', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_7635116')->references('id')->on('crm_customers');
        });
    }
}

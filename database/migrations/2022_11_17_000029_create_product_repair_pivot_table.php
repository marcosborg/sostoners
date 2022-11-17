<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRepairPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_repair', function (Blueprint $table) {
            $table->unsignedBigInteger('repair_id');
            $table->foreign('repair_id', 'repair_id_fk_7611794')->references('id')->on('repairs')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_7611794')->references('id')->on('products')->onDelete('cascade');
        });
    }
}

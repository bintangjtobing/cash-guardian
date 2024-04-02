<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('purchase_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('transaction_type');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase_types');
    }
};

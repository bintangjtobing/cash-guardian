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
        Schema::create('petty_cash_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petty_cash_account_id')->nullable();
            $table->foreign('petty_cash_account_id')->references('id')->on('petty_cash_accounts')->onDelete('cascade');
            $table->string('description');
            $table->string('amount');
            $table->string('transaction_type');
            $table->unsignedBigInteger('purchase_type_id')->nullable();
            $table->foreign('purchase_type_id')->references('id')->on('purchase_types')->onDelete('set null');
            $table->unsignedBigInteger('site_id')->nullable();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('set null');
            $table->timestamps();
        });
        Schema::create('petty_cash_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->date('report_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('petty_cash_transactions');
        Schema::dropIfExists('petty_cash_reports');
    }
};

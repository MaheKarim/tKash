<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tkash_methods', function (Blueprint $table) {
            $table->id();
            $table->char('name', 40);
            $table->decimal('min_trx_limit', 28, 8);
            $table->decimal('max_trx_limit', 28, 8);
            $table->decimal('fixed_charge', 28, 8);
            $table->decimal('percent_charge', 28, 8);
            $table->decimal('rate', 28, 8);
            $table->char('currency', 40);
            $table->decimal('user_daily_trx_limit', 28, 8);
            $table->decimal('user_monthly_trx_limit', 28, 8);
            $table->decimal('agent_daily_trx_limit', 28, 8);
            $table->decimal('agent_monthly_trx_limit', 28, 8);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('tkash_methods');
    }
};

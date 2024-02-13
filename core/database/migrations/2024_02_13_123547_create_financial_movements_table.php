<?php

use App\Constants\Status;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('financial_movements', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->unsignedBigInteger('user_id');
            $table->decimal('amount');
            $table->decimal('charge');
            $table->decimal('final_amount');
            $table->char('trx');
            $table->unsignedBigInteger('receiver_id');
            $table->char('remark')->nullable();
            $table->tinyInteger('status')->default(Status::PAYMENT_SUCCESS);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_movements');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableInvoids extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('phone_number');
            $table->string('address');
            $table->unsignedDouble('total_price'); // số thực không dấu(chỉ dương vì giá luôn >=0)
            $table->integer('status')->default(config('common.invoice.status.cho_duyet'));
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}

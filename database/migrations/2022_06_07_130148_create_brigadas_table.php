<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brigadas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('donateType',['Monetary', 'In Kind']);
            $table->string('donation');
            $table->string('quantity');
            $table->string('amount');
            $table->date('date');
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
        Schema::dropIfExists('brigadas');
    }
};

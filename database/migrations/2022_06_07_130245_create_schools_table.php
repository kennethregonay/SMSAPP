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
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string('schoolID');
            $table->string('name');
            $table->string('type');
            $table->string('address');
            $table->string('gradelevel');
            $table->string('section');
            $table->string('schoolyear');
            $table->foreignId('learner_id')->nullable()->constrained()->onDelete('cascade') ->onUpdate('cascade');
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
        Schema::dropIfExists('schools');
    }
};

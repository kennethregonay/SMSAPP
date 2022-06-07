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
        Schema::create('learners', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('mname')->nullable();
            $table->string('lname');
            $table->string('extension');
            $table->string('typelearners');
            $table->string('glevel');
            $table->string('LRN')->nullable();
            $table->string('contactNo')->nullable();
            $table->string('email')->nullable();
            $table->string('gender');
            $table->string('birthdate');
            $table->string('religion');
            $table->string('motherTongue');
            $table->string('national')->nullable();
            $table->string('indeginousPpl')->nullable();
            $table->string('address');
            $table->string('PWD')->nullable();
            $table->enum('EnrollmentStatus', ['Incomplete','Pre-Registered', 'Enrolled'])->default('Incomplete');
            $table->bigInteger('RefNo')->nullable();
            $table->foreignId('parent_id') ->constrained()->onDelete('cascade') ->onUpdate('cascade');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('cascade') ->onUpdate('cascade');
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
        Schema::dropIfExists('learners');
    }
};

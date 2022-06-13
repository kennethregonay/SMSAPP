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
            $table->string('extension')->nullable();
            $table->enum('typelearners',['Enrollee', 'Transferee']);
            $table->enum('glevel', ['Kindergarten', 'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 'Grade 6']);
            $table->string('LRN')->nullable();
            $table->string('contactNo')->nullable();
            $table->string('email')->nullable()->unique();
            $table->enum('gender',['Male', 'Female']);
            $table->string('birthdate');
            $table->string('religion')->nullable();
            $table->string('motherTongue');
            $table->string('national')->nullable();
            $table->string('address');
            $table->string('PWD')->nullable();
            $table->enum('EnrollmentStatus', ['Pre-Registered', 'Registered' , 'Unsettled'])->default('Pre-Registered');
            $table->bigInteger('RefNo')->nullable()->unique();
            $table->string('GWA');
            $table->string('guardians_id');
            $table->foreignId('section_id')->nullable()->constrained()->onDelete('cascade') ->onUpdate('cascade');
            $table->timestamps();

        });
    }

  
    public function down()
    {
        Schema::dropIfExists('learners');
    }
};

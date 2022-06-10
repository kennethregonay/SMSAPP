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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('gender', ['Male', 'Female'])->nullable();
            $table->string('birthdate')->nullable();
            $table->string('startingYear')->nullable();
            $table->string('contactNo')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('role',['Brigada Coordinator', 'Enrollment Officer', 'LIS Coordinator'])->nullable();
            $table->enum('type',['Teacher', 'Principal']);
            $table->enum('status',['Pending', 'Active', 'Deactivated'])->default('Pending');
            $table->string('educattain')->nullable();           
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
        Schema::dropIfExists('users');
    }
};
{{  }}{{  }}
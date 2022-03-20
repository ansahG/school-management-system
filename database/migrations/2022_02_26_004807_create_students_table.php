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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id');
            $table->string('_studentAvatar')->nullable();
            $table->string('_firstName');
            $table->string('_lastName');
            $table->string('_otherName')->nullable();
            $table->string('_birthDate');
            $table->string('_ghanaCard');
            $table->string('_gender');
            $table->string('_religion');
            $table->longText('_moreInfo')->nullable();
            $table->string('_parentName');
            $table->string('_parentEmail');
            $table->string('_parentPhone');
            $table->string('_parentGhanaCard');
            $table->boolean('trash')->default(false);
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
        Schema::dropIfExists('students');
    }
};

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
        Schema::create('personal_information', static function (Blueprint $table) {
            $table->id();
            $table->string('first_name', '15');
            $table->string('last_name', '15');
            $table->string('city', '15');
            $table->string('country', '30');
            $table->string('phone', '15');
            $table->string('nationality', '40');
            $table->tinyInteger('gender'); // 1 is male, 2 is female
            $table->string('head_line', '50');
            $table->string('about_me', '1000');
            $table->foreignId('user_id')->constrained('users');
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
        Schema::dropIfExists('personal_information');
    }
};

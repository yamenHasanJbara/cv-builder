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
        Schema::create('experiences', static function (Blueprint $table) {
            $table->id();
            $table->string('position_name', '100');
            $table->string('company', '100');
            $table->string('city', '30');
            $table->string('country', '40');
            $table->text('task');
            $table->string('contact_name', '40')->nullable();
            $table->string('contact_email', '255')->nullable();
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('experiences');
    }
};

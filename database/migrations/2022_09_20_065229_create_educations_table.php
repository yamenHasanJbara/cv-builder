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
        Schema::create('educations', static function (Blueprint $table) {
            $table->id();
            $table->string('name', '100');
            $table->string('university', '120');
            $table->string('city', '30');
            $table->string('country', '40');
            $table->tinyInteger('degree'); // 1 undergraduate //2 bachelor's // 3 master // 4 Phd
            $table->float('great_point_average')->nullable();
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
        Schema::dropIfExists('educations');
    }
};

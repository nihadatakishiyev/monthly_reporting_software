<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('training_id');
            $table->string('person_no');
            $table->foreign("person_no")->references('person_no')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->string('training_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('type_loc');
            $table->string('type_emp');
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
        Schema::dropIfExists('trainings');
    }
}

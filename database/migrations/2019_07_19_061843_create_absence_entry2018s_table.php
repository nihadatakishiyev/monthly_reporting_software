<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAbsenceEntry2018sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absence_entry2018s', function (Blueprint $table) {
            $table->bigIncrements('absence_id');
            $table->string('person_no');
            $table->foreign('person_no')->references('person_no')->on('users')->onDelete('cascade');
            $table->string('description');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('type');
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
        Schema::dropIfExists('absence_entry2018s');
    }
}

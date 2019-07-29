<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('male_num');
            $table->integer('female_num');
            $table->integer('azin_staff_num');
            $table->integer('outsource_azin');
            $table->integer('outsource_ministry');
            $table->integer('outsource_sebeke')->default('0');
            $table->integer('school_num');
            $table->integer('texn_num');
            $table->integer('bachelor_num');
            $table->integer('master_num');
            $table->integer('phd_num');
            $table->integer('opening_balance');
            $table->integer('closing_balance');
            $table->integer('hr_turnover');
            $table->integer('avarage_age');
            $table->integer('intranet_enterance');
            $table->date('date');
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
        Schema::dropIfExists('hr_data');
    }
}

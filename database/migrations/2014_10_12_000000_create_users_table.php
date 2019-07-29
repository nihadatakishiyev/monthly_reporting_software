<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('person_no')->unique()->default('000001');
            $table->string('name');
            $table->string('surname');
            $table->string('status')->default('At work');
            $table->string('birth_date');
            $table->string('gender');
            $table->string('education');
            $table->string('position');
            $table->string('org_unit')->default('tech');
            $table->string('email');
            $table->string('type')->default('staff');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
}

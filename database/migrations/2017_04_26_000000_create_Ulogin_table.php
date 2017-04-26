<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateULoginTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('u_login', function (Blueprint $table) {
            $table->increments('id');
            $table->string('last_name')->default('no_name');
            $table->string('first_name')->default('no_name');
            $table->string('profile')->default('no_name');
            $table->string('uid');
            $table->string('identity')->default('no_name');
            $table->string('network');
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
        Schema::drop('u_login');
    }
}
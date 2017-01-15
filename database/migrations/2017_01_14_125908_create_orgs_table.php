<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orgs', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('name');
            $table->string('url');
            $table->string('description')->nullable();
            $table->string('avatar');
            $table->integer('userid');
            $table->string('username');
            $table->string('token')->nullable();
            $table->string('role')->default('undefined');
            $table->string('password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orgs');
    }
}

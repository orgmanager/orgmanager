<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->longText('description')->nullable();
            $table->string('avatar');
            $table->integer('userid');
            $table->integer('invitecount')->default('0');
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

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOauthIdentitiesTable extends Migration
{
    public function up()
    {
        Schema::create('oauth_identities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('provider_user_id');
            $table->string('provider');
            $table->string('access_token');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('oauth_identities');
    }
}

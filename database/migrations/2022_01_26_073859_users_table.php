<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_db', function (Blueprint $table) {
            // Id is big int, unsigned (not -), not null, auto_increment (increasing in number).
            $table->bigIncrements('id');
            // atribut name with type varchar(255) and not null.
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('gender');
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['admin', 'member'])->default('member');
            // for making created_at and updated_at
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
        // delete Table existing user_db if exist
        Schema::dropIfExists('user_db');
    }
}

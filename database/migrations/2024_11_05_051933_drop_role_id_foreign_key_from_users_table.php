<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropRoleIdForeignKeyFromUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Adjust the constraint name based on your migration or database setup
            $table->dropForeign(['role_id']);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Re-add the foreign key if necessary
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
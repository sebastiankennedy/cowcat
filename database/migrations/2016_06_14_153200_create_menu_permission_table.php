<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuPermissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_permission', function (Blueprint $table) {
            $table->integer('menu_id')->unsigned();
            $table->integer('permission_id')->unsigned();

            $table->foreign('menu_id')->references('id')->on('menus')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('permission_id')->references('id')->on('permissions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['permission_id', 'menu_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menu_permission');
    }
}

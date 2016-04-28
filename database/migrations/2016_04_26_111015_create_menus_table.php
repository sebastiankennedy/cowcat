<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->smallInteger('parent_id')->default(0)->comment('父级菜单ID');
            $table->string('icon', 50)->comment('菜单图标');
            $table->string('name', 50)->comment('菜单名称');
            $table->string('route', 50)->comment('菜单路由');
            $table->string('description', 50)->comment('菜单描述');
            $table->tinyInteger('sort')->default(0)->comment('菜单排序');
            $table->tinyInteger('hide')->default(0)->comment('是否隐藏');
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
        Schema::drop('menus');
    }
}

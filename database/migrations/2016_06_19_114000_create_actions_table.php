<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('group')->comment('操作分组');
            $table->string('name')->comment('操作名称');
            $table->string('action')->comment('操作路由');
            $table->string('description')->comment('操作描述');
            $table->tinyInteger('state')->default(1)->comment('是否禁用');
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
        Schema::drop('actions');
    }
}

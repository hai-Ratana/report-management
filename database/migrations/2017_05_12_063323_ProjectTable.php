<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wrm-tbl-projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nameProject')->unique();
            $table->string('description')->nullable();
            $table->string('duration');
            $table->string('other')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('wrm-tbl-projects');
    }
}

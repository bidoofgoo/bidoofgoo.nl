<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectpagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('projectpages', function (Blueprint $table) {
         $table->increments('id');
         $table->string('slug')->unique();
         $table->integer('project_id')->unsigned()->nullable();
         $table->string('title');
         $table->longText('content');
         $table->boolean('showalturl')->default(True);
         $table->timestamps();

         $table->foreign('project_id')->references('id')->on('projects');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projectpages');
    }
}

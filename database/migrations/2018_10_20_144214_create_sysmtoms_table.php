<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysmtomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sysmtoms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('symptom');
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');
            $table->unsignedInteger('suggest_by');
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
        Schema::dropIfExists('sysmtoms');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJemaatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jemaat', function (Blueprint $table) {
            $table->id();
            $table->string('no_kk', 191);
            $table->string('nik', 191);
            $table->string('head_of_family', 191);
            $table->string('name', 191);
            $table->string('birthplace', 191);
            $table->date('date_of_birth');
            
            $table->bigInteger('lingkungan_id')->unsigned()->nullable();
            $table->foreign('lingkungan_id')
            ->references('id')
            ->on('lingkungan')
            ->onCascade('set null')
            ->onDelete('set null');
            
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
        Schema::dropIfExists('jemaat');
    }
}
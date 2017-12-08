<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Usertable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user',function(Blueprint $table){
            $table->increments('id');//id adında int bir sütun oluşturur autoincrements ve primary key olarak.
            $table->string('name');//name adında varchar değer oluşturur
            $table->string('surname',25);//surname adında varchar 25 karakter uzunluğunda değer oluşturur
            $table->integer('age');//age adında int değer oluşturur.
            $table->boolean('status');//status adında boolen değer oluşturur
            $table->dateTime('birthday');//Datatime tipinde değer oluşturur
            $table->dateTime('jobstartdate');//datatime tipinde değer oluşturur
            $table->rememberToken();//remember_token adında varchar değerini taşıyan alan oluşturur.
            $table->timestamps();//created_at , updated_at adında iki adet timestamp türünde sütun oluşturur.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Tabloyu sileriz
        Schema::dropIfExists('users');
    }
}

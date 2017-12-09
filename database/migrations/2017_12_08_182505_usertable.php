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
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id')->index();//id adında int bir sütun oluşturur autoincrements ve primary key olarak.
            $table->string('name')->nullable();//name adında varchar değer oluşturur
            $table->string('surname',25)->nullable();//surname adında varchar 25 karakter uzunluğunda değer oluşturur
            $table->string('password')->nullable();//password adında varchar değer oluşturur
            $table->string('email')->nullable();//email adında varchar değer oluşturur. Bu değer tekildir iki kez aynı mail adresi ile veri eklenemez
            $table->integer('age')->unsigned()->index()->nullable();//age adında int değer oluşturur.
            $table->text('aboutuser')->nullable();//aboutuser adında text veri oluşturur 
            $table->boolean('status')->nullable();//status adında boolen değer oluşturur
            $table->dateTime('birthday')->nullable();//Datatime tipinde değer oluşturur
            $table->dateTime('jobstartdate')->nullable();//datatime tipinde değer oluşturur
            $table->rememberToken()->nullable();//remember_token adında varchar değerini taşıyan alan oluşturur.
            $table->timestamps()->nullable();//created_at , updated_at adında iki adet timestamp türünde sütun oluşturur.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}

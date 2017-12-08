<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Userupdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //User tablosuna eklemeyi unuttuğum sütunları ekliyorum
        Schema::table('user',function(Blueprint $table) {
            $table->string('password');//password adında varchar değer oluşturur
            $table->text('aboutuser');//aboutuser adında text veri oluşturur 
            $table->string('email')->unique()->nullable();//email adında varchar değer oluşturur. Bu değer tekildir iki kez aynı mail adresi ile veri eklenemez.Ayrıca null değeri alabilir.
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

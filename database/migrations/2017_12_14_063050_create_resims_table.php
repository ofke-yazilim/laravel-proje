<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resimler', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->integer('order');
            $table->boolean('status');
            //Polymorphic Relatioships kullanımında aşağıdaki iki sütunun kullanımı şartır.
            $table->integer('image_id');//Polymorphic ilişki kuracağımız tabloyla bağlantı kurduğujmuz sütundur. Bağlatı sağlayan tabloya ait id değerini taşır.
            $table->string('image_type');//Hangi model dosyası ile bağlantı sağlayacağımızı gösterir => "App\Makale" şeklinde değer taşır
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
        Schema::dropIfExists('resimler');
    }
}

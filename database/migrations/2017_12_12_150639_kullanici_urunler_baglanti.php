<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KullaniciUrunlerBaglanti extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urun_kullanici_baglanti', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kullanici_id');
            $table->integer('urun_id');
            $table->string('kargo')->nullable();
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
        Schema::dropIfExists('urun_kullanici_baglanti');
    }
}

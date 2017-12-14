<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KullaniciUrunBaglantiAddRow extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('urun_kullanici_baglanti', function (Blueprint $table) {
            //Tabloya yeni iki sütun ekliyorum
            $table->timestamps();
            $table->string("kargo");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('urun_kullanici_baglanti', function (Blueprint $table) {
            //
            $table->dropColumn("kargo");
            $table->dropColumn("updated_at");
            $table->dropColumn("created_at");
        });
    }
}

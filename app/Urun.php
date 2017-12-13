<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    //Urun modelimizde kullanacağımız tablo adı tanımlandı.
    protected $table = "urunler";
    
    //Many to Many Relationships
    //Kullanici modeli ile bağlantı tablosu aracılığı ile ilşiki kuruluyor
    protected function kullanicilar() {
        return $this->belongsToMany("App\kullanici", "urun_kullanici_baglanti", "urun_id")
            ->withTimestamps()->withPivot('kargo');
    }
}

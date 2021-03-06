<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makale extends Model
{
    //Model yamızın kullanacağı tablo ismi tanıtıldı.
    protected $table = "makaleler";
    
    //Kullanıcı tablosu ile one to many ilişkisi kuruluyor
    protected function kullanici() {
        return $this->belongsTo("App\kullanici", "kullanici_id", "id");
    }
    
    //Has Many Through kullanımı
    //Kullanici tablosunu ara tablo yaparak 
    //image talosundan kullanıcıya ait resimleri listeliyoruz.
    protected function kullanciResimler() {
        return $this->hasManyThrough("App\Image", "App\kullanici", "image_id","kullanici_id", "id");
    }
    
    //Polimorphic One To Many Relatioships 
    //Makale ve Ürün resimlerinin turulduğu resimler tablosundan makale resimleri alınıyor.
    protected function MakaleResimler() {
        //Hatırlarsanız resimler tablosuna  bağlantı id değerimi ve bağlatı typ değerlerimi "image" başlığını kullanarak gerçekledim.
        return $this->morphMany("App\Resim", "image");
    }
    
}

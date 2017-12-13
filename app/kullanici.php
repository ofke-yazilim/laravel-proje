<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kullanici extends Model
{
    ################### Model Kullanım Örnekleri İçin Bakınız: newcontroller.php => index fonksiyonu ####################
    //Kullanacağım tablo ismini belirtiyorum.
    protected $table = "kullanicilar";
    
    //Önemli : $fillable ve $guarted dizileri aynı anda tanımlanamaz.
    //ORM üzerinde ::create,::update,::delete  methodları ile işlem yapmak için iki tanımdan birinin kullanımı şarttır.
    //Bu tanımlama ile bu model yapısı ile veri tabanına kayıt yaparken sadece bu sütun isimlerini istediğimizi belirtiyoruz.
    protected $fillable = [
        'name',
        'surname',
        'status'
    ];
    
    //fillablenin tam tersi olark çalışır sehir hariç sütunları kayıt eder.
//    protected $guarded = [
//        'sehir'
//    ];
    
    //One to One ilişki kuruyoruz 
    //Kullanıcı tablosu ile ilişki kurduk.
    protected function image(){
        return $this->hasOne("App\Image", "kullanici_id" , "id");
    }
    
    //One to Many ilişki kullanıyoruz
    //Makele tablosuna bağlantı kuraqcapız
    protected function makaleler() {
        return $this->hasMany("App\Makale","kullanici_id","id");
    }
    
    //Many To Many ilşkisi kullanıyoruz
    //Urunler tablosu ile ilişki kurduk
    protected function urunler() {
        return $this->belongsToMany("App\Urun", "urun_kullanici_baglanti", "kullanici_id")
            ->withTimestamps()->withPivot('kargo');
    }
}

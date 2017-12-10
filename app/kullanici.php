<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kullanici extends Model
{
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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resim extends Model
{
    //Model dosyamız içerisinde kullanacağımız resimler tablosu tanıtılıyor
    protected $table = 'resimler';
    
    //One To Many Polimorfik İlişki ile 
    //Resim id değeri verilen makale bilgisi getiriliyor.
    protected function image() {
        return $this->morphTo();
    }
}

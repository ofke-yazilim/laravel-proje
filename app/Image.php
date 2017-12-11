<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //Model yapımız içerisinde kullanacağımız tablo ismi tanımlanıyor
    protected $table = 'images';
    
    //Model işlemleri yaparken kullanacağımız sütun isimleri tanımlandı.
    protected $fillable = [
        'id',
        'image',
        'kullanici_id',
        'created_at',
        'updated_at'
    ];
    
    //Kullanıcı tablosu ile one to one relationships bağlantısı
    public function kullanici() {
        //App\kullanici => ilişki kuracağımız modeli temsil eder.
        //id=> kullanici tablosunda bulunan ve kullanici id değerini taşyan sütundur.
        //kullanici_id=> images tablosunda bulunan ve kullanici id değerini taşyan sütundur.
        $this->hasOne("App\kullanici", "id", "kullanici_id");
    }
    
}

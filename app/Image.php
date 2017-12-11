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
    
}

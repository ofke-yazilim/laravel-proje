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
}

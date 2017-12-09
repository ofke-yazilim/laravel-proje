<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class newcontroller extends Controller
{
    //index methodu
    public function index(){
        return "Controller içerisine yöneldik.";
    }
    
    //Collection işlemleri
    /*
     * Collection dizilerin daha kullanışlı hale gelmesini sağlayan bir sınıftır.
     */
    public function collection(){
        #https://laravel.com/docs/5.5/collections#method-avg adresini ziyaret et
        #### TEK BOYUTLU COLLECTION #####
        #
        //Array bir dizi oluşturuluyor.
        $data = [1,2,3,4,5,6,7,8,9];
       
        //Oluşturulan dizi collection olarak set ediliyor
        $collection = collect($data);
        
        //Ortalamasını alalım
        $result = $collection->avg();
        
        //Collection üzerine veri eklemek için içerisine 10 ve 11 değerlerini ekledim.
        $collection = $collection->concat([10])->concat(['name' => 11]);
        
        //Collaction içerisinde verilen değeri arar.
        $result = $collection->contains('Desk');//false döner
        $result = $collection->contains(11);//true döner
        
        //Collaction boyutu döner
        $result = $collection->count();
        
        //İki adet collactionu birleştirir ve tüm olası sonuçları döner
        //E-ticaret sisteminde renk beden eşleştirmeleri gibi düşün
        $result = $collection->crossJoin(['a', 'b']);

        //İstenmeyen elemanlar çıkarılır 
        $result = $collection->diff([2, 4, 6, 8]);
        
        //collection içerisindeki verileri sıra ile ekrana basar.
        $collection = $collection->each(function ($item) {
            if($item==4){
                echo $item;
            }
        });
        
        #   
        #### TEK BOYUTLU COLLECTION SON#####
        
        return dd($result);
        
        //Oluşturduğumuz bu collectionu wiew dosyamıza gönderelim
//        return view('collection', compact('collection'));   
    }
}

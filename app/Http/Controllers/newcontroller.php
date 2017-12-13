<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//İşlem yapacağımız model dosyamız tanıtıldı
use App\kullanici;
use App\Image;
use App\Makale;
use App\Urun;

class newcontroller extends Controller
{
    //index methodu
    /*
     * Bu method içerisinde ORM kullanarak sql işlemleri gerçekleştiriyorum.
     */
    public function index(){
        /*
         * query builder içerisinde kullandığım tüm methodlar ORM içinde geçerlidir.
         */
        //ORM Kullanarak insert işlemi Örneği
        $kullanici = new kullanici;
        $kullanici->name = "Ömer Faruk";
        $kullanici->surname = "KESMEZ";
        $kullanici->email = "info@ofkeyazilim.com";
        $kullanici->save();
        
        //ORM Kullanrak insert işlemi2
        //Bu yöntemi kullanacaksak model dosyamız içerisinde fillable yada guarded dizilerini tanılamalıyız.
        kullanici::create(["name"=>"Halil İbrahim","surname"=>"KESMEZ"]); 

        //ORM Kullanarak Update İşlemi Örneği
        $kullanici = kullanici::find(1);
        $kullanici->name = "Ömer Faruk";
        $kullanici->surname = "KESMEZ";
        $kullanici->email = "ofke@ofkeyazilim.com";
        $kullanici->save();
        
        //ORM Update işlemi 2
        kullanici::find(1)->update(['status'=>1]);
        
        //ORM Delete işlemleri
        kullanici::where('id',">",5)->delete();
        
        //id değeri 1 olan kullanıcı verilerini döndürür
        $result = kullanici::find(1);
        
        //kullanici tablosundan id değeri 2 den büyük olanların içinde id değeri en büyük olan 1 değer döndürecek.
        $result = kullanici::where("id",">",2)->orderBy('id','desc')->first();
        
        //one to one örneği
        //Kullanıcı id değerine göre image tablosundan verileri getiriyor.
        $result = kullanici::find(1)->image;
        if($result){//Eğer kullanıcıya ait resim varsa
            //İmage tablosundan tek bir sütun getiriyor.
            $result = kullanici::find(1)->image->image;

            $result = Image::find(1)->kullanici;
            $result = Image::find(1)->kullanici->name;  
        }
        
        //one to many örneği
        //Kullanıcı id değeri 1 olan kişi için makale listesi alınıyor
        $result = kullanici::find(1)->makaleler;
        if($result!="[]"){//Eğer kullanıcıya ait makale bulunuyor ise
            //id değeri 1 olan makaleyi yazan kullanıcı bilgileri alınıyor.
            $result = Makale::find(1)->kullanici;
        }
        
        //Almış olduğum makale listesini view içerisine göndereyim
        //makaleler.blade.php içerisinde makalelerimi listeliyorum.
//        return view("makaleler",compact('result'));
        
        //Many To Many İlişkisi
        $result = kullanici::find(1)->urunler;
        $result = Urun::find(1)->kullanicilar;
        
        //Has Many Through İlişkisi
        //1 idli makaleyi yazan kişinin resim bilgileri alınıyor.
        $result = Makale::find(1)->kullanciResimler;

        //Sonuçlar döndürülüyor
        return dd($result);
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
        $data = [1,2,3,4,5,6,7,8,9,"ömer",""];
       
        //Oluşturulan dizi collection olarak set ediliyor
        $collection = collect($data);
        
        //Ortalamasını alalım
        $result = $collection->avg();
        
        //Collection üzerine veri eklemek için içerisine 10 ve 11 değerlerini ekledim.
        $result = $collection->concat([10])->concat(['name' => 11]);
        
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
        $collection->all();
        
        //Aşağıdaki kod collection içerisindeki tüm dataları istenilen şekilde işler
        //Bütün değerleri büyük harf yapar. ve boş olan değerleri collection içerisinden çıkarır
        //Transform aksine yeni bir collection oluşturur
        $collection = $collection->map(function($item) {
            return strtoupper($item);
        })
        ->reject(function ($item) {
            return empty($item);
        });
        
        //Her bir collection üzerinde işlem yapmaızı ve güncelleme yapmamızı sağlar.
        $collection->transform(function ($item) {
            return $item * 2;
        });
        $collection->all();
        
        //Collection tekrar array yapmak
        $result =  $collection->toArray();
        
        //Collection yapımızı json yapmak için
        $result = $collection->toJson();

        #   
        #### TEK BOYUTLU COLLECTION SON#####
        
        return dd($result);
        
        //Oluşturduğumuz bu collectionu wiew dosyamıza gönderelim
//        return view('collection', compact('collection'));   
    }
    
    /*
     * 2 boyutlu array ile yapılan collection işlemleri
     */
    public function collection2() {
        //2 boyutlu dizimiz tanmlandı  
        $array = ["ad"=>"Ömer","ad"=>"Yasin","ad2"=>"Faruk","soyad"=>"KESMEZ","il"=>"BURSA"];
        
        //2 boyutlu Collection oluşturuluyor
        $collection = collect($array);
        
        //oluşturulan collection ekrana yazılıyor // view içerisinde kullanılıyor olabilir.
        $collection->all();
        
        //Collection değerleri içersinde arama yapar
        $result = $collection->contains('Faruk');//true döner
        
        //Üç boyutlu bir array içerisinde arama yapmak için
        //Üç boyutlu bir collection
        $collection3 = collect([
            ['product' => 'Desk', 'price' => 200],
            ['product' => 'Chair', 'price' => 100,"il"=>"BURSA"],
            ['product' => 'Chair', 'price' => 100,"il"=>"BURSA"],
        ]);

        $result = $collection3->contains('price', 200);
        
        //Collection eleman sayısı döner 
        $result = $collection3->count();
        
        //2 buyutlu collection içerisinde belirtilen değerler çıkarır
        $result = $collection->diffAssoc([
            'il' => "BURSA"
        ]);
        
        //2 buyutlu collection içerisinde belirtilen anahtara sahip değeri siler
        $result = $collection->diffKeys([
            'il' => "ANGARA"
        ]);
        
        //3 boyutlu collection içerisinde verilen anahtara uygun olarak gruplar
        $result = $collection3->groupBy('product');
        $result->toArray();
        
        return dd($result);
    }
}

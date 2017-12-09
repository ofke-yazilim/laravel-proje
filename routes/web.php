<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route sayfaından controller çağırmadan direk view sayfasına ulaşmak
Route::get('/', function () {
    //resources/welcome.blade.php dosyasına gider.
    return view('welcome');
});

//Aşağıda /ekaran çağırdığımda ekrana string yazar.
Route::get('/ekran', function(){
    return "Ekrana Sadece String Basıyoruz";
});

//Url ekranında get verisi göndermek id verisi gönderdik.
route::get('/kullanicilar/{id}', function($id){
    return "Kullanıcı id değeri : ".$id;
});

//? optional görevi görür yani id alanı boş bile gnderilse çalışır.
Route::get('optional/{id?}' , function($id=null){
    return "Optional/".$id;
});

//iki Parametre gönderen örnek için
//İsim ve id adında iki parametre gönderelim
//Aşağıda optioanal kullanarak eğer id boi ise 1 ve isim boş ise omer değerlerini almasını sağladım.
route::get('/kullanicilar/{id?}/{isim?}', function($id=1,$isim="omer"){
    return "id değeri : ".$id." ismi : ". $isim;
});

//route isim atamak
//Aşağıda /isimatama şeklinde çalışan sayfamıza routeisim adında isim atadık.
//Bu bize şöyle bir kolaylık sağlayacak örneğin blade içerisinde link tanımlareken href içerisine routeisim yazmak yetecek.
Route::get('/isimatama',["as"=>"routeisim",function(){
    return "Route İsim Atandı";
}]);

//Route kullanarak controller dosyasına yönlendirme yapalım
//Aşağıda yonlendircontroller adında route oluşturduk
//Oluşan bu route newcontroller adındaki controller dosyamızdaki index methodunu çağırıyor.
Route::get('/yonlendircontroller',["as"=>"yonlendircontroller" , "uses"=>"newcontroller@index",function(){}]);

//Route üzerinde namspace kullanımı
//Controllerin altında oluşturulan test1 klasörü içerisindeki controller dosyalarını çalıştırmamızı sağlar
Route::group(['namespace' => 'test1'],function (){
    //Aşağıda test1 klasöründe bulunann testController dosyasındaki indez methodu çağrılır
    //Parametre olarak id değeri alıyor id değeri buş giderse 12 değerrini alacak şekilde ayarlandı.
    Route::get('/test1/liste/{id?}',["as"=>"test1.liste","uses"=>"testController@index",function($id=12){}]);
});

############################## SQL İŞLEMLERİ ###########################################

//Laravel Sql işlemleri için : https://laravel.com/docs/5.5/queries adresini inceleyin
//aşağıda daha önce migration kullanarak oluşturmuş olduğum user tablosuna veri ekliyorum
Route::get('/deneme/insert',  function(){
    //User tablosuna örnek bir insert işlemi yapılması
    $result = DB::table('user')->insert(
        ['name' => 'Ömer Faruk' , 'surname' => 'KESMEZ' ,'email' => 'ofke@gmail.com', 'status' => 1 , 'created_at' => date("Y-m-d H:i:s") , 'sehir' => 'BURSA']
    );
    
    //User tablosuna 2 adet insert yapılıyor
    $result = DB::table('user')->insert([
        ['name' => 'Halil İbrahim' , 'surname' => 'YURT' ,'email' => 'halil@gmail.com', 'status' => 1 ,  'age' => 25 , 'created_at' => date("Y-m-d H:i:s") , 'sehir' => 'FETHİYE'],
        ['name' => 'YUNUS' , 'surname' => 'FARDA' ,'email' => 'yunus@gmail.com', 'status' => 1 , 'age' => 20 , 'created_at' => date("Y-m-d H:i:s") , 'sehir' => 'BURSA']   
    ]);
    
    //dd methodu var_dump() özelliği taşır sonuçları almamızı sağlar
    return dd($result);
});

//Aşağıda user tablomuzdan select işlemi ile veri çekme işlemi yapılıyor
Route::get('deneme/select/{id?}',function($id=null){
    //Basit bir select işlemi user tablosundan "name,surname,email" verilerini getiriyor.
    $result = DB::table('user')->select('name','surname','email')->get();
    
    //where kullanımlı select sorgusu status değer 1 olan kişilerin isimlerini getirir.
    $result = DB::table('user')->select('name')->where('status','=',1)->get();
    
    if($id){
        //2 where , 1 orderby kullanımlı select sorgusu status değer 1 olan kişilerin isimlerini ve id değerlerini getirir.
        $result = DB::table('user')->select('id','name')->where('status','=',1)->where('id',"=",$id)->orderBy('id','desc')->get();
    } else{
        //1 where ,orderby kullanımlı select sorgusu status değer 1 olan kişilerin isimlerini ve id değerlerini getirir.
        $result = DB::table('user')->select('id','name')->where('status','=',1)->orderBy('id','desc')->get();
    }
    
    //Select sonuçları ekrana baslıyor
    return dd($result);
    
    //Aşağıdaki şekildede listeleyebilirdik.
    //return $result;
});

//id değeri gönderilen kullanıcı veritabanı üzerinden silinir.
Route::get('deneme/delete/{id}',function($id){
    //id değeri belirtilen kullanıcıyı siler
    $result = DB::table('user')->where('id','=',$id)->delete();
    
    //Silme başarılı ise 1 başarısız ise  0 döner
    return $result;
});

//Update işlemleri id değeri gönderlen kullanıcının verileri güncellenir
Route::get('deneme/update/{id}',function($id){
    //id değeri gönderilen kullanıcının name,surname,status alanları güncellenir.
    $result = DB::table('user')->where('id',"=",$id)->update(['name'=>'Halil İbrahim','surname'=>'KESMEZ','status'=>1]);
    
    //Güncelleme başarılı ise 1 başarısız ise  0 döner
    return $result;
});

############################ SQL ÖRNEKLERİ SON ##################################

//Controller/admin/user.php controller dosyasına ulaşmak için
Route::group(["namespace"=>"admin"],function(){
    //Hazır olarak oluşturduğum controller yapıma home fonksiyonunu ekledim yönlendirmesini tanımlıyorum.
    Route::get('/yonetimpaneli/home/{title?}',["as"=>"yonetimpaneli.home","uses"=>"user@home",function($title="Başlık Girilmedi"){}]);
    //Hazır methodlar içeren controller yapısı oluşturdum bu sayede kolayca yönlendirmeleri yaptım.
    Route::resource('yonetimpaneli','user');
});

//Controller/admin/urunler.php controller dosyasına ulaşmak için
Route::group(["namespace"=>"admin"],function(){
    //Hazır methodlar içeren controller yapısı oluşturdum bu sayede kolayca yönlendirmeleri yaptım.
    Route::resource('yonetimpaneli','urunler');
});

//Controller/kullanici/urunler.php controller dosyasına ulaşmak için
Route::group(["namespace"=>"kullanici"],function(){
    //Hazır methodlar içeren controller yapısı oluşturdum bu sayede kolayca yönlendirmeleri yaptım.
    Route::resource('kullanici','urunler');
});

###############  YUKARIDA ROUTE KULLANIM ÖRNEKLERİ BULUNMAKTADIR #######################

###############  RESTFULL APİ ÖRNEĞİ   #################

//Tüm kullanıcıların bilgilerinin alınacağı yönlendirme yapıulıyor.
Route::get('/rest/alluser',["as"=>"alluser","uses"=>"restfulController@getAllUser",function(){}]);

//Tek bir kullanıcı bilgilerinin alınacağı yönlendirme yapılıyor.
Route::get('/rest/user/{id}',["as"=>"alluser","uses"=>"restfulController@getUser",function($id){}]);




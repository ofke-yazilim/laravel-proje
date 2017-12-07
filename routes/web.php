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

Route::get('/', function () {
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
Route::get('/yonlendircontroller',["as"=>"yonlendircontroller" , "uses"=>"newcontroller@index",function(){

}]);

//Route üzerinde namspace kullanımı
//Controllerin altında oluşturulan test1 klasörü içerisindeki controller dosyalarını çalıştırmamızı sağlar
Route::group(['namespace' => 'test1'],function (){
    //Aşağıda test1 klasöründe bulunann testController dosyasındaki indez methodu çağrılır
    //Parametre olarak id değeri alıyor id değeri buş giderse 12 değerrini alacak şekilde ayarlandı.
    Route::get('/test1/liste/{id?}',["as"=>"test1.liste","uses"=>"testController@index",function($id=12){}]);
});

//Controller/admin/user.php controller dosyasına ulaşmak için
Route::group(["namespace"=>"admin"],function(){
    //Hazır olarak oluşturduğum controller yapıma home fonksiyonunu ekledim yönlendirmesini tanımlıyorum.
    Route::get('/yonetimpaneli/home/{title?}',["as"=>"yonetimpaneli.home","uses"=>"user@home",function($title="Başlık Girilmedi"){}]);
    //Hazır methodlar içeren controller yapısı oluşturdum bu sayede kolayca yönlendirmeleri yaptım.
    Route::resource('yonetimpaneli','user');
});

###############  YUKARIDA ROUTE KULLANIM ÖRNEKLERİ BULUNMAKTADIR #######################

###############  RESTFULL APİ ÖRNEĞİ   #################

//Tüm kullanıcıların bilgilerinin alınacağı yönlendirme yapıulıyor.
Route::get('/rest/alluser',["as"=>"alluser","uses"=>"restfulController@getAllUser",function(){}]);

//Tek bir kullanıcı bilgilerinin alınacağı yönlendirme yapılıyor.
Route::get('/rest/user/{id}',["as"=>"alluser","uses"=>"restfulController@getUser",function($id){}]);




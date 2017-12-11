# laravel-proje

Laravel 5.6 Wamp Server
<h1>1 - LARAVEL KURULUMU VE WİNDOWS SANAL SUNUCU OLUŞTURULMASI</h1>
<ul>
<li>Windows üzerine  http://www.wampserver.com/en/# adresinden wamp  server indirip kuruyoruz.</li>
<li>Wamp server kurulumu bittikten sonra <strong>C://wamp64/www </strong> dizini  içerisinde laravel adında  bir klasör oluşturuyoruz. </li>
<li>Ardından composer kullanarak laravel dosyalarını laravel klasörümüzün içerisine kuruyoruz.</li>
<li>
<span>Not : Windows Üzerine Composer  kurulumu yapmadıysanız Aşağıdaki Adımları Takip Edin</span>
<ul>
<li>  Composer nasıl kurulur : https://getcomposer.org/Composer-Setup.exe adresinden indirilen exe next, next ile kurulur.</li>
<li>   Ardından command ekranı kullanılarak composer eklenmek istenilen projeye gidilir örneğin ben wamp üzerinde proje yapıyorum "cd C:\wamp64\www\laravel" bu projeye gidebilirim.</li>
 <li>  Proje yolunu command ekranında tanıttıktan sonra "composer init" yazarak composer.json dosyamı oluturuyorum. (composer.json oluştururken bir kaç bilgi isteyecek bizden.girerek enter yapalım.)</li>
</ul>
 </li>
<li>Command ekranında<strong> cd C:\wamp64\www\laravel </strong> dizinine giderek <br><strong> composer create-project --prefer-dist laravel/laravel laravelproje </strong> <br>
Kodunu çalıştırıyorum bir süre sonra laravel kurulumum tamamlanıyor.
</li>
<li>
<span>Yukarıdaki adımları takip edip Laravel dosyalarımı  local bilgisayarıma indirdim şimdi sanal sunucu oluşturarak projenin çalışmasını sağlamalıyım bunun için aşağıdaki adımları takip etmeliyim.</span>
<ul>
<li>Wamp server ile kurulu olarak gelen apache dizini içerisinde bulunan <strong>httpd.conf</strong> dosyası açılarak  <strong>Include conf/extra/httpd-vhosts.conf </strong> yazısı bulunur ve aktif edilir.<br>
Not : Benim httpd.conf  dizinimin dosya yolu : <br><strong> C:\wamp64\bin\apache\apache2.4.23\conf \ httpd.conf  </strong>
 </li>
<li>Daha sonra <strong>C:\wamp64\bin\apache\apache2.4.23\conf\extra</strong>  dizini içerisinde bulunan <strong>httpd-vhosts.conf </strong> dosyası açılarak sanal sunucu yönlendirmeleri yapılır . Örneğin ben laravel projemin http://laravel.localhost/ şeklinde açılmasını istiyorsam https://github.com/ofke-yazilim/laravel-proje/blob/master/httpd-vhost.conf dosyasında bulunan kodları httpd-vhosts.conf   dosyasının en altına eklerim .<br><br>
</li>
</ul>
 </li>
<li>Yukarıdaki işlemlerden sonra wamp server restart edilir ve  browser açılarak http://laravel.localhost/  adresine gidilerek projenin çalıştığı görülür.</li>
</ul>
<br>
<h1>2 - LARAVEL KULLANIM AŞAMALARI</h1>
<br>
<h2>2.1 Migration Kullanımı</h2>
<ul>
    <li>Öncelikle projemiz içerisinde kullanacağımız veritabanı bilgilerini .env dosyasına belirtiyoruz. .env dosyası direk ana dizin içerisinde bulunur.</li>
    <li>
    <span>Migration kullanılarak database içerisinde tablolar oluştururuz. Migration dizini dosya yolu: /database/migrations</span>
        <ul> 
            <li>Migration class dosyası terminal ekranına kodu <strong>php artisan make:migrate usertable</strong> yazılarak oluşturulur. Usertable adında bir class oluşturduk.</li>
            <li>Yukarıdakinden farklı olarak  <strong>php artisan make:migrate usertable --create:user</strong> yazılarakda migration oluşturulur.
                Burada up ve down fonksiyonları dolu gelir bu kodla migration
                oluşturmak daha mantıklıdır. user database içerisine oluşacak olan tablonun ismidir.</li>
            <li>Oluşan migration dosyasına girilerek oluşturulmak istenen tablo özellikleri ayarlanır.</li>
            <li>Migration iki adet fonksiyon taşır. up fonksiyonu tablo oluştururken down oluşan tabloyu kaldırır. up fonksiyonu içerisine tabloya ait sütun özellikleri belirtilir.<br>
                Örnek(Tablo oluşturma): https://github.com/ofke-yazilim/laravel-proje/blob/master/database/migrations/2017_12_08_182505_usertable.php<br>
                Örnek(Oluşturulmuş Tablo Güncelle) : Örnek(Tablo oluşturma): https://github.com/ofke-yazilim/laravel-proje/blob/master/database/migrations/2017_12_08_182649_userupdate.php
            </li>
            <li>Tablo özellikleri belirtildikten sonra <strong>php artisan migrate</strong> kodu çalıştırılır ve özellikleri belirtilen tablo veritabanına oluşturulur.</li>
            <li>Daha önce tanımlamış olduğumuz migration üzerinde güncelleme yapmak için <strong>php artisan make:migration user_add_colums --table:user</strong> kodunu çalıştırmamız yeterli
                bu kod user tablosunda güncelleme işlemi yapacağımız yeni bir migration oluşturur bu migration dosyası açılıp düzenlemeler yapıldıktan sonra 
                <strong>php artisan migrate</strong> komutu ile yapılan değişiklikler database üzerine aktarılır.<br>
                Örnek(Oluşturulmuş Tablo Güncelle) : Örnek(Tablo oluşturma): https://github.com/ofke-yazilim/laravel-proje/blob/master/database/migrations/2017_12_08_182649_userupdate.php</li>
            <li>Migration ile ilgili ayrıntılı bilgi için bakınız: https://laravel.com/docs/5.5/migrations</li>
        </ul>
    </li>
</ul>

<h2>2.2 Route ve Controller Kullanımı</h2>
<span>Route Laravel üzerinde yönlendirme işlemlerini yaptığımız kısımdır. Laravel 5.6 üzerinde yönlendirme işlmeleri ana dizin içerisinde 
routes/web.php üzerinde yapılmaktadır.Routes isteklerin bir controller dosyasına ya da view dosyasına yönelmesini sağlar ya da yönlendirme 
yapmadan işlemlerinizi direk bu kısımda yapablirsiniz. Ayrıntılı kullanım örneklerini : https://github.com/ofke-yazilim/laravel-proje/blob/master/routes/web.php
adresinden inceleyebilirsiniz. </span>
<br>
<br>
<em>Aşağıda Bahselilen Satır numaralarını incelemek için <strong>https://github.com/ofke-yazilim/laravel-proje/blob/master/routes/web.php</strong>
sayfasını açınız.</em>
<br>
<br>
<ul>
    <li>Route üzerinde direk view ekranına yönlendirme yapabiliriz.Benim projem içerisinde routes/web.php 15. satırda örnek görebilirsiniz.</li>
    <li>İşlemleri direk olarak route üzerinde yapabiliriz. Örneğin ekrana bir string yazdırabiliriz.Örnek için 21. satır inceleyebilirsiniz.</li>
    <li>Url üzerinde herhangi bir parametre göndrerek işlem yapabilirsiniz. Örnek için 26. satır.</li>
    <li>Url üzerinden parametre gönderme işlemlerinde eğer istenilen parametre gönderilmez ize hata verir örneğin 
        diyelim ki http:\\laravel.localhost\urunler\1 şeklinde çalışan bir adresimiz olsun eğer biz bu adresi 
        http:\\laravel.localhost\urunler\ şeklinde çalıştırır isek hata verir bu hatayı <strong>optional</strong> kullanral önleyebiliriz 
        optional parametre boş olarak gelirse default olarak atanan bir değere göre işlem yapmamızı sağlar. Örnek için 31. ve 38. satırlar.
    </li>
    <li>Kullanılan route işlemine isim vermek için bakınız 45.satır. Route verilen isim sayfa içerisinde yani view yapıları içerisinde
        tanımlamada kolaylık sağlar. Örneğin bir route işlemine "routeislem" adında tanımlar ise view içerisinde yönlendirme link adresine 
        {{route('routeislem')}} yazılarak ulaşılabilir.</li>
    <li>
        <span>Route üzerinden controller dosyasına yönlendirme örneği için 52. satırı inceleyebilirsiniz.</span>
        <ul>
            <h3>2.2.1 Controller İşlemleri</h3>
            <em>Controller dosyaları Model ve view yapıları arasında köprü görevi gören dosyalarımızdır.</em>
            <li>Laravel üzerinde controller dosyları <strong>/app/Http/Controllers</strong> içerisinde bulunur.</li>
            <li>Yeni bir controller oluşturulurken iki yöntem vardır 1.yöntem <strong>php artisan make:controller newcontroller</strong>
                Bu yöntem ile newcontroller.php adında bir controller dosyamız oluşur. Bu dosya içerisinde class hazır gelir fakat
                fonksiyonları biz oluştururuz. Örneğin : https://github.com/ofke-yazilim/laravel-proje/blob/master/app/Http/Controllers/newcontroller.php
            </li>
            <li>2. yöntem ise <strong>php artisan make:controller new2controller --resource</strong> şeklinde çalışan sistemdir.
                Bu yöntemde index,store,create.. vb fonksiyonlar hazır olarak gelir.<br>
                Örneğin https://github.com/ofke-yazilim/laravel-proje/blob/master/app/Http/Controllers/new2controller.php dosyasını inceleyebilirsiniz.
            </li>
            <li>2.yöntem ile tanımlama yaparsak route yönlendirme işlemlerini çok kolaylaştırmış oluruz öreneğin yukarıda oluşturmuş olduğumuz 
                new2controller adındaki controller dosyasına yönlendirme yaparken <strong>Route::resource('yonetimpaneli','new2controller');</strong>
                yazarız bu sayede hazır olarak gelen tüm fonksiyonların yönlendirme linkleri oluşturulmuş olur. Örnek için 130.satır.
            </li>
        </ul>
    </li>
    <li>Route üzerinde namespace kullanımı :  Namespace şu nedenle gereklidir diyelimki urunler adında iki adet controller oluşturmak istiyoruz 
        Bu controllerden biri kullanıcı arayüzü işlemleri için diğeri yönetim paneli işlemleri için kullanılmak isteniyor olsun fakat aynı klasör 
        içinde urunler adında iki adet dosya oluşturulamaz bu sebeple namespace geliştirilmiştir yani iki farklı klasör oluşturulur ve bu klsörler 
        içerisine urunler adında controller dosyası oluşturulur.Şimdi kullanıcı arayüz urunler için ve yönetim paneli ürünler için 
        kullanılacak olan controller dosyalarını oluşturan kodları yazalım.<br>
        <strong>php artisan make:controller admin/urunler --resource</strong><br>
        <strong>php artisan make:controller kullanici/urunler --resource</strong><br>
        Controller dosyalarımız oluştu şimdi bu controller dosyalarına route üzerinde nasıl yönlendirildiğini görmek için 33.satır- 43.satır arasını
        inceleyebilirsiniz.
    </li>  
    <li>Oluşturulan route yönlendirmelerinin listesini ve link yapılarını görebilmek için <strong>php artisan controller:list</strong> 
        kodu kullanılır.
    </li>  
    <li>Route dosyası içerisinde query builder işlemleri yapıldı örnek query builder kullanımları için.
        66. satırdan itibaren inceleyebilirsiniz. Daha ayrıntılı bilgi için https://laravel.com/docs/5.5/queries adresini 
        ziyaret edin.
    </li>
</ul>

<h2>2.3 Collection Kullanımı</h2>
<span>Collectionlar Laravel içerisinde bulunan ve dizileri kullanmayı daha kullanışlı bir hale sokan methodları içeren bir sınıftır.
      Bu sınıfı kullanarak array verilerimizi collectionlara çevirerek daha kolay işleyebileceğiz.
</span>
<ul>
    <li>Collection için Controller dosyasında yapılan örneklere : https://github.com/ofke-yazilim/laravel-proje/blob/master/app/Http/Controllers/newcontroller.php dosyasından inceleyebilirsiniz.</li>
    <li>Collectionların view üzerinde kullanım örnekleri için : https://github.com/ofke-yazilim/laravel-proje/blob/master/resources/views/collection.blade.php dosyasına bakabilirsiniz.</li>
    <li><em>Daha Ayrıntılı Öğrenmek için : https://laravel.com/docs/5.5/collections adresini ziyaret edin.</em></li>
</ul>

<h2>2.4 Model ve ORM Yapıları</h2>
<span>
    ORM : Oluşturmuş olduğumuz nesnemiz ile veritabanı bağlantısından bağımsız olarak yapmış olduğumuz veritabanı işlemleridir.
    ORM üzerinde bildiğimiz klasik sql sorguları yani select,update.. vb. bulunmamaktadır. Bu sayede ORM ile yapmış olduğumuz 
    kodlama tüm veritabanı sistemlerinde geçerli olur. Laravel üerinde kullandığımız Model yapımız ise ORM ile yaptığımız işlermleri
    kapsamaktadır.
</span>
<ul>
<li>Model dosyamızı oluşturmak için <strong>php artisan make:model Kullanici</strong> yazarız bu sayede default olarak <strong>Kullanicis</strong>
    tablosunda işlem yapacak olan Model dosyamız <strong>/app/Http/Kullanici.php</strong> şeklinde oluşur.</li>
<li>Ayrıca Model dosyamızı oluşturuken aynı zamanda migration dosyamızıda oluşturan bir kod vardır.
   <strong>php artisan make:kullanici -m</strong> bu kod sayesinde Model dosyamız <strong>/app/Http/Kullanici.php</strong> 
   dosya youlunda oluşurken aynı zamanda bu Model dosyamızın işlem göreceği tablo olan <strong>Kullanicis</strong> tablosunun 
   özelliklerini ve sütun isimlerini belirtebileceğimiz migration dosyamız ise <strong>/database/migrations/</strong> dizini 
   altında oluşur. Bu durumda önce gidip migration dosyamızı kullanarak 2.1 başlığı altında anlattığım Migration Kullanım Aşamalarını
   takip ederek database üzerine tablomuzu oluşturmalıyız. Dilersek default olarak gelen kullanicis tablosu ismini migration dosyamız içerisinden 
   istediğimiz şekilde değiştirebiliriz. Eğer Tablo ismini değiştirdik ise ozaman Model dosyamız içerisinde bulunan class
   içerisine yeni tablo ismimizi tanıtmalıyız bu tanıtımı ise <strong> protected $table = "kullanicilar";</strong> yazarak yapabiliriz.
   Ben bu kodu yazarak Model dosyamın artık <strong>kullanicilar</strong> tablosunda işlem yapmasını istediğimi belirtiyorum.
</li>
<li>
    <em>ORM Sorgu örneklerini https://github.com/ofke-yazilim/laravel-proje/blob/master/app/Http/Controllers/newcontroller.php dosyasında index fonksiyonu 
        içerisinde gerçekletirdim. Daha önce Route dosyam içerisinde 66. satırdan sonra query builder örnekleri yapmıştım bu 
        örnekler içerisinde kullandığım methodlar ORM işlemleri için de geçerlidir.</em><br>
    Örnek Query Builder Methodları için : <strong>https://laravel.com/docs/5.5/queries</strong> adresini ziyaret ediniz.
</li>
</ul>

<h2>2.5 Eloquent: Relationships Kullanımı</h2>
<strong>
    <em>
        Relationships : Sql sorgularında yapmış olduğumuz join işlemlerinin ORM üzerindeki karşılığıdır. Yani tablolar arası ilişkileri
        temsil ederler.
    </em>
</strong>
<h3>2.5.1 One To One Relationships</h3>
<ul>
    <li>Bu Relationships türünde iki tablo arasında bire bir ilişki kurmamızı sağlar.</li>
    <li>
        Örneğin bir image tablosu oluşturalım ve bu tablo üzerinde kullanıcılara ait resim bilgileri tutulsun.
        Her kullanıcı için tek bir resim tutulabiliyor olsun işte bu durumda One To One kuralı geçerlidir.
    </li>
    <li>
        Model dosaymız üzerindeki one to one işlemlerini : https://github.com/ofke-yazilim/laravel-proje/blob/master/app/kullanici.php <br>
        https://github.com/ofke-yazilim/laravel-proje/blob/master/app/Image.php dosyalarından inceleyebilirsiniz.
    </li>
    <li>
        Controller dosyamız içerisindeki örnekler için https://github.com/ofke-yazilim/laravel-proje/blob/master/app/Http/Controllers/newcontroller.php dosyasında
        index methodu içerisinde 52. satırdan itibaren inceleyebilirsiniz.
    </li>
</ul>
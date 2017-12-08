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
    <span>Migration kullanılarak database içerisinde tablolar oluştururuz. Migration dizini : /database/migrationS</span>
        <ul> 
            <li>Migration class dosyası terminal ekranına kodu <strong>php artisan make:migrate usertable</strong> yazılarak oluşturulur. Usertable adında bir class oluşturduk.</li>
            <li>Oluşan migration dosyasına girilerek oluşturulmak istenen tablo özellikleri ayarlanır.</li>
            <li>Migration iki adet fonksiyon taşır. up fonksiyonu tablo oluştururken down oluşan tabloyu kaldırır. up fonksiyonu içerisine tabloya ait sütun özellikleri belirtilir.<br>
                Örnek : https://github.com/ofke-yazilim/laravel-proje/blob/master/database/migrations/2017_12_08_130246_usertable.php
            </li>
            <li>Tablo özellikleri belirtildikten sonra <strong>php artisan migrate</strong> kodu çalıştırılır ve özellikleri belirtilen tablo veritabanına oluşturulur.</li>
            <li>Migration ile ilgili ayrıntılı bilgi için bakınız: https://laravel.com/docs/5.5/migrations</li>
        </ul>
    </li>
</ul>
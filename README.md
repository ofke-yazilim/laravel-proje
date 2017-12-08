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

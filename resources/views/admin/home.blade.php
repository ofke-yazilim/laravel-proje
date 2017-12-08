@extends('admin.app') <!-- Ana theme yükleniyor.-->

@section('pagetitle')
Admin Anasayfa
    @stop

@section('content')
<h1>Proje Yönetim Paneli Ana Sayfası</h1>
<span>Gönderilen Başlık : {{$title}}</span>
<span>Gönderilen İsim : {{$name}}</span>

<!-- Gönderilen tek boyutlu array ekrana yazılıyor-->
<table>
    <tr>
        @foreach($array1 as $value)
            <td>{{$value}}</td>
        @endforeach
    </tr>
</table>

<!-- Gönderilen iki boyutlu array ekrana yazılıyor-->
<table>
    <tr>
        @foreach($array2 as $key=>$value)
            <td>{{$key}}=>{{$value}}</td>
        @endforeach
    </tr>
</table>
    @stop
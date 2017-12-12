@extends('admin/app')

@section('content')
    @if(@result)
        @foreach($result as $value)
           <li>{{$value->makale}}</li> 
        @endforeach
        
    @endif
@stop
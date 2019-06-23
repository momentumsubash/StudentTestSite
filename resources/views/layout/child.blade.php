@extends('master')
@section('title', 'Page Title')
@section('sidebar')
    @parent
    <p>This refers to the master sidebar.</p>
@endsection
@section('content')
    <p>This is my body content.</p>


    <label>This is our title{{$data['title']}}</label>
    <label>This is our description : {{$data['Description']}}</label>
    <label>This is our author : {{$data['author']}}</label>
    <div class="header_phone d-flex flex-row align-items-center justify-content-center">
        <img src= "{{URL::asset('/images/phone.png')}}" alt="">
        <span>0183-12345678</span>
    </div>

    <div class="menu_phone d-flex flex-row align-items-center justify-content-center">
        <img src= "{{URL::asset('images/phone-2.png')}}"  alt="">
        <span>0183-12345678</span>
    </div>

@endsection
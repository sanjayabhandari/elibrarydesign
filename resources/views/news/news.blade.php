@extends('master')
@section('title','News')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/sytle8.css')}}">
@endsection
@section('news')
@include('news.partials.news1')
@endsection
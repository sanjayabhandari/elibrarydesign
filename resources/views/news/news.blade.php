@extends('master')
@section('title','News')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/style8.css')}}">
@endsection
@section('news')
@include('news.partials.news1')
@endsection
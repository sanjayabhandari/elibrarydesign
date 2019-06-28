@extends('master')
@section('title','blog')
@section('styles')
<link rel="stylesheet" href="{{asset('assets/style6.css')}}" type="text/css">
@endsection
@section('blog')
@include('blog.partials.blog1')
@endsection
@extends('master')
@section('title','Category')
@section('styles')
<link rel="stylesheet" href="{{asset('assets/style4.css')}}" type="text/css">
@endsection
@section('category')
@include('category.partials.category1')
@include('category.partials.detailcategory')
@endsection
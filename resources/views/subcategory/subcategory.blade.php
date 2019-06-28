@extends('master')
@section('title','SubCategory')
@section('styles')
<link rel="stylesheet" href="{{asset('assets/style5.css')}}" type="text/css">
@endsection
@section('subcategory')
@include('subcategory.partials.subcategory1')
@include('subcategory.partials.subcategoryslider')

@endsection
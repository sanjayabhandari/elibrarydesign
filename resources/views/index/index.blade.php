@extends('master')
@section('title','homepage')
@section('styles')
<link rel="stylesheet" type="text/css" href="assets/style.css">
@endsection
@section('content')
@include('index.partials.slider')
@include('index.partials.browseBooks')
@include('index.partials.browseBooks1')
@endsection
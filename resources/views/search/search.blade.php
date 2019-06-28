@extends('master')
@section('title','Search Page')
@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('assets/style7.css')}}">
@endsection
@section('search')
@include('search.partials.search1')
@endsection
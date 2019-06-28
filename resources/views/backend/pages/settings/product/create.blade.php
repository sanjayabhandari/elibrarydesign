@extends('backend.main')
@section('title','Product ')
@section('pagename','Add-Product')
@section('content')
<div class="content">
    <div class="container-fluid">

        <product-form productid="{{request()->route()->id}}"></product-form>
    </div>
</div>
@endsection

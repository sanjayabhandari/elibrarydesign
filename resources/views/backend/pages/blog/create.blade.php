@extends('backend.main')
@section('title','Blog ')
@section('pagename','Blog-Create')
@section('content')
<div class="content">
    <div class="container-fluid">

        <blog-form blogid="{{request()->route()->id}}"></blog-form>
    </div>
</div>
@endsection

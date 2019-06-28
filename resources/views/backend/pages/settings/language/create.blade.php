@extends('backend.main')
@section('title','Language ')
@section('pagename','Language-Create')
@section('content')
<div class="content">
    <div class="container-fluid">

        <Language-form Languageid="{{request()->route()->id}}"></Language-form>
    </div>
</div>
@endsection
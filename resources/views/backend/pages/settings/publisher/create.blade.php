@extends('backend.main')
@section('title','Publisher ')
@section('pagename','Publisher-Create')
@section('content')
<div class="content">
    <div class="container-fluid">

        <publisher-form publisherid="{{request()->route()->id}}"></publisher-form>
    </div>
</div>
@endsection
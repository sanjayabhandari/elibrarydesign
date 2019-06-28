@extends('backend.main')
@section('title','Author ')
@section('pagename','Author-Create')
@section('content')
<div class="content">
    <div class="container-fluid">

        <author-form authorid="{{request()->route()->id}}"></author-form>
    </div>
</div>
@endsection

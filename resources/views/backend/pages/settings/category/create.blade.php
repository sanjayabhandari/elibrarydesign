@extends('backend.main')
@section('title','Category ')
@section('pagename','Category-Create')
@section('content')
<div class="content">
    <div class="container-fluid">

        <category-form categoryid="{{request()->route()->id}}"></category-form>
    </div>
</div>
@endsection

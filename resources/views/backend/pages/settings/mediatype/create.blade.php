@extends('backend.main')
@section('title','Media ')
@section('pagename','Media-Create')
@section('content')
<div class="content">
    <div class="container-fluid">

        <media-form mediaid="{{request()->route()->id}}"></media-form>
    </div>
</div>
@endsection

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Blog Create</title>
  </head>
  <body>
    <h1>Edit Blog</h1>

    <div class="card mb-3">
            <form class="form-horizontal" method="POST" action="/blog/{{$blog->id}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">

            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Blog title') }}</label>

                <div class="col-md-6">
                    <input id="blog_title" type="text" class="form-control{{ $errors->has('blog_title') ? ' is-invalid' : '' }}" name="blog_title" value="@if(old('blog_title')==""){{$blogg->blog_title}}@else{{old('blog_title')}}@endif" required autofocus >

                    @if ($errors->has('blog_title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('blog_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('short title') }}</label>

                <div class="col-md-6">
                    <input id="short_title" type="text" class="form-control{{ $errors->has('short_title') ? ' is-invalid' : '' }}" name="short_title" value="@if (old('short_title')==null){{$blogg->short_title }}@else{{ olf('short_title') }}@endif" >

                    @if ($errors->has('short_title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('short_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Blog date') }}</label>

                <div class="col-md-6">
                    <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="@if (old('date')==null){{$blogg->date }}@else{{ olf('date') }}@endif" required autofocus >

                    @if ($errors->has('date'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('date') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Blog Description') }}</label>

                <div class="col-md-6">
                    <input id="blog_description" type="text" class="form-control{{ $errors->has('blog_description') ? ' is-invalid' : '' }}" name="blog_description" value="@if (old('blog_description')==null){{$blogg->blog_description }}@else{{ olf('blog_description') }}@endif" required autofocus>

                    @if ($errors->has('blog_description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('blog_description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Meta title') }}</label>

                <div class="col-md-6">
                    <input id="meta_title" type="text" class="form-control{{ $errors->has('meta_title') ? ' is-invalid' : '' }}" name="meta_title" value="@if (old('meta_title')==null){{$blogg->meta_title }}@else{{ olf('meta_title') }}@endif" >

                    @if ($errors->has('meta_title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('meta_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Blog tag') }}</label>

                <div class="col-md-6">
                    <input id="meta_tag" type="text" class="form-control{{ $errors->has('meta_tag') ? ' is-invalid' : '' }}" name="meta_tag" value="@if (old('meta_tag')==null){{$blogg->meta_tag }}@else{{ olf('meta_tag') }}@endif" >

                    @if ($errors->has('meta_tag'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('meta_tag') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Meta Description') }}</label>

                <div class="col-md-6">
                    <input id="meta_description" type="text" class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}" name="meta_description" value="@if (old('meta_description')==null){{$blogg->meta_description }}@else{{ olf('meta_description') }}@endif" >

                    @if ($errors->has('meta_description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('meta_description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('File upload') }}</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="@if (old('image')==null){{$blogg->image }}@else{{ olf('image') }}@endif" >

                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                <div class="col-md-6">
                        <select name="status" id="status" class="form-control">
                            @if(old('status')==0)
                            <option value="0" @if($blogg->status== 0) selected="selected" @endif>Inactive</option>
                            <option value="1" @if($blogg->status== 1) selected="selected" @endif>Active</option>

                            @else
                            <option value="1" @if(old('status')== 0) selected="selected" @endif>Active</option>
                            <option value="0" @if(old('status')== 1) selected="selected" @endif>Inactive</option>
                            @endif

                        </select>
                    </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                     submit
                    </button>
                </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

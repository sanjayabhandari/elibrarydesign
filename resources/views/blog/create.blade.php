<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  </head>
  <body>
    <h1>Create blog</h1>

    <div class="card-body">
        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
            @csrf


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Blog title') }}</label>

                <div class="col-md-6">
                    <input id="blog_title" type="text" class="form-control{{ $errors->has('blog_title') ? ' is-invalid' : '' }}" name="blog_title" value="{{ old('blog_title') }}" required autofocus>

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
                    <input id="short_title" type="text" class="form-control{{ $errors->has('short_title') ? ' is-invalid' : '' }}" name="short_title" value="{{ old('short_title') }}" >

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
                    <input id="date" type="date" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required autofocus>

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
                    <input id="blog_description" type="text" class="form-control{{ $errors->has('blog_description') ? ' is-invalid' : '' }}" name="blog_description" value="{{ old('blog_description') }}" required autofocus>

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
                    <input id="meta_title" type="text" class="form-control{{ $errors->has('meta_title') ? ' is-invalid' : '' }}" name="meta_title" value="{{ old('meta_title') }}" >

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
                    <input id="meta_tag" type="text" class="form-control{{ $errors->has('meta_tag') ? ' is-invalid' : '' }}" name="meta_tag" value="{{ old('meta_tag') }}" >

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
                    <input id="meta_description" type="text" class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}" name="meta_description" value="{{ old('meta_description') }}" >

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
                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}">

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
                     <select name="status" class="form-control">
                        <option value="1" class="form-control">Active</option>
                        <option value="0" class="form-control">Inactive</option>
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

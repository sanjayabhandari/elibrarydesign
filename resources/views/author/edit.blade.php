<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Author create</title>
  </head>
  <body>
    <h1>Edit Author</h1>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="/author/{{$author->id}}" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">

            <div class="form-group row">
                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Author Name') }}</label>

                <div class="col-md-6">
                    <input id="author_name" type="text" class="form-control{{ $errors->has('author_name') ? ' is-invalid' : '' }}" name="author_name" value="{{ old('author_name') }}" required autofocus>

                    @if ($errors->has('author_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('author_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>





            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

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
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Date of birth') }}</label>

                <div class="col-md-6">
                    <input id="dob" type="date" class="form-control{{ $errors->has('dob') ? ' is-invalid' : '' }}" name="dob" value="{{ old('dob') }}" required autofocus>

                    @if ($errors->has('dob'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dob') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Date of Death') }}</label>

                <div class="col-md-6">
                    <input id="dod" type="date" class="form-control{{ $errors->has('dod') ? ' is-invalid' : '' }}" name="dod" value="{{ old('dod') }}">

                    @if ($errors->has('dod'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('dod') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                <div class="col-md-6">
                    <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>

                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                <div class="col-md-6">
                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Author Title') }}</label>

                <div class="col-md-6">
                    <input id="author_title" type="text" class="form-control{{ $errors->has('author_title') ? ' is-invalid' : '' }}" name="author_title" value="{{ old('author_title') }}">

                    @if ($errors->has('author_title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('author_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Social Profile') }}</label>

                <div class="col-md-6">
                    <input id="socialprofile" type="text" class="form-control{{ $errors->has('socialprofile') ? ' is-invalid' : '' }}" name="socialprofile" value="{{ old('socialprofile') }}">

                    @if ($errors->has('socialprofile'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('socialprofile') }}</strong>
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

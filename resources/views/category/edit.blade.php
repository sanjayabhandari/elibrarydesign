<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Post create</title>
  </head>
  <body>
    <h1>Edit Post</h1>
    <div class="card-body">
        <form class="form-horizontal" method="POST" action="/category/{{$category->id}}" enctype='multipart/form-data'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="PUT">


            <div class="form-group row">
                <label for="slug" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control{{ $errors->has('cat_name') ? ' is-invalid' : '' }}" name="cat_name" value="{{ old('cat_name') }}" required autofocus>

                    @if ($errors->has('cat_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('cat_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>



            <div class="form-group row">
                <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('level') }}</label>

                <div class="col-md-6">

                    <select name="level" class="form-control">
                        <option value="0" class="form-control">Parent</option>
                        <option value="1" class="form-control">Child</option>
                        <option value="2" class="form-control">Sub-Child</option>
                    </select>
                </div>
            </div>



            {{-- <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('relation') }}</label>

                <div class="col-md-6">
                    <input id="relation" type="text" class="form-control{{ $errors->has('relation') ? ' is-invalid' : '' }}" name="relation" value="{{ old('relation') }}" required autofocus>

                    @if ($errors->has('relation'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('relation') }}</strong>
                        </span>
                    @endif
                </div>
            </div> --}}

            {{-- <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('parent') }}</label>

                <div class="col-md-6">
                    <input id="parent" type="text" class="form-control{{ $errors->has('parent') ? ' is-invalid' : '' }}" name="parent" value="{{ old('parent') }}" required autofocus>

                    @if ($errors->has('parent'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('parent') }}</strong>
                        </span>
                    @endif
                </div>
            </div> --}}


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                <div class="col-md-6">
                     <select name="status" class="form-control">
                        <option value="1" class="form-control">Active</option>
                        <option value="0" class="form-control">Inactive</option>
                    </select>
                </div>
            </div>



            <div class="form-group row">
                <label for="parent" class="col-md-4 col-form-label text-md-right">{{ __('Parent') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="parent" name="parent">
                        @if(old('parent') == "")
                            <option class="form-control" value="0">Please Select Parent</option>
                            @foreach ($parent as $item)
                            <option class="form-control" value="{{$item->id}}" @if (old('parent') == $item->id) selected="selected" @endif>{{$item->cat_name}}</option>                                  @endforeach
                        @else
                            <option class="form-control" value="0" @if (old('parent') == 0) selected="selected" @endif>Please Select parent</option>
                            @foreach ($parent as $item)
                                <option class="form-control" value="{{$item->id}}" @if (old('parent') == $item->id) selected="selected" @endif>{{$item->cat_name}}</option>
                            @endforeach
                        @endif
                    </select>
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="child" class="col-md-4 col-form-label text-md-right">{{ __('Child') }}</label>
                    <div class="col-md-6">
                        <select class="form-control" id="child" name="child">
                        @if(old('child') == "")
                            <option class="form-control" value="0">Please Select child</option>
                            @foreach ($child as $item)
                            <option class="form-control" value="{{$item->id}}" @if (old('child') == $item->id) selected="selected" @endif>{{$item->cat_name}}</option>                                  @endforeach
                        @else
                            <option class="form-control" value="0" @if (old('child') == 0) selected="selected" @endif>Please Select child</option>
                            @foreach ($child as $item)
                                <option class="form-control" value="{{$item->id}}" @if (old('parent') == $item->id) selected="selected" @endif>{{$item->cat_name}}</option>
                            @endforeach
                        @endif
                    </select>
                    </div>
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
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Meta Tag') }}</label>

                <div class="col-md-6">
                    <input id="meta_tag" type="text" class="form-control{{ $errors->has('meta_tag') ? ' is-invalid' : '' }}" name="meta_tag" value="{{ old('meta_tag') }}" required autofocus>

                    @if ($errors->has('meta_tag'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('meta_tag') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Meta Title') }}</label>

                <div class="col-md-6">
                    <input id="meta_title" type="text" class="form-control{{ $errors->has('meta_title') ? ' is-invalid' : '' }}" name="meta_title" value="{{ old('meta_title') }}" required autofocus>

                    @if ($errors->has('meta_title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('meta_title') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Meta Description') }}</label>

                <div class="col-md-6">
                    <input id="meta_description" type="text" class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}" name="meta_description" value="{{ old('meta_description') }}" required autofocus>

                    @if ($errors->has('meta_description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('meta_description') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group row">
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Feature Image') }}</label>

                <div class="col-md-6">
                    <input id="image" type="file" class="form-control{{ $errors->has('image') ? ' is-invalid' : '' }}" name="image" value="{{ old('image') }}" required autofocus>

                    @if ($errors->has('image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('image') }}</strong>
                        </span>
                    @endif
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

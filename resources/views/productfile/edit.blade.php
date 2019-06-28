<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Product File create</title>
  </head>
  <body>
    <h1>Edit Product File</h1>
    <div class="card mb-3">
            <form class="form-horizontal" method="POST" action="/productfile/{{$productfile->id}}" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PUT">

    <div class="form-group row">
            <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('File upload') }}</label>

            <div class="col-md-6">
                <input id="fileformate" type="file" class="form-control{{ $errors->has('fileformate') ? ' is-invalid' : '' }}" name="fileformate[]" value="{{ old('fileformate') }}" multiple>

                @if ($errors->has('fileformate'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('fileformate') }}</strong>
                    </span>
                @endif
            </div>
        </div>









            <div class="form-group row">
                    <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('status') }}</label>

                    <div class="col-md-6">
                            <select name="status" id="status" class="form-control">
                                @if(old('status')==0)
                                <option value="0" @if($prod->status== 0) selected="selected" @endif>Inactive</option>
                                <option value="1" @if($prod->status== 1) selected="selected" @endif>Active</option>

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
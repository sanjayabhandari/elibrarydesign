<form class="form2 pl-5 mt-5" method="POST" action="{{ route('register') }}">
    <div class="row no-gutters">
        <div class="col-lg-12 text-center pt-3">
            <h3 class="text-white">Sign Up</h3>
        </div>
    </div>
    {{csrf_field()}}
    <div class="ml-5">
        <div class="row no-gutters">

            <div class="col-lg-12 text-white">
                <label for="name">{{ __('Name') }}</label>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-12">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Your Full Name" required>
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-12">
                <label for="email" class="text-white" style="text-align:left;">{{ __('Email') }}</label>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-12">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email" required>
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-12 text-white">
                <label for="phone">{{ __('Phone') }}</label>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-12">
                <input type="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone"
                    value="{{ old('phone') }}" autocomplete="phone" placeholder="Your Number" required>
                @error('number')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-12 mt-1">
                <label class="text-white " for="password">{{ __('Enter Password') }} <i class="fas fa-key"></i></label>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-12">
                <input id="password" type="password" class="form-control @error('name') is-invalid @enderror"
                    name="password" value="{{ old('password') }}" autocomplete="password" autofocus
                    placeholder="Password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-12 mt-1">
                <label class="text-white " for="password">{{ __('Confirm Password') }} <i
                        class="fas fa-key"></i></label>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-12">
                <input id="password" type="password" class="form-control @error('name') is-invalid @enderror"
                    name="password_confirmation" value="{{ old('password') }}" autocomplete="password" autofocus
                    placeholder="Password" required>
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-lg-12 mt-3 ml-5">
            <button class="btn btn-primary button3" type="submit">{{ __('Sign Up') }}</button>
        </div>
    </div>
    <div class="row no-gutters">
        <div class="col-lg-12 text-white text-center mt-2">
            <p class=" text3">
                By continuing, you agree our <a href="#" class="text-white">terms and conditions.</a>
            </p>
        </div>
    </div>
</form>

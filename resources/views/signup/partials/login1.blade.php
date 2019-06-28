<!-- <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="mt-5 mb-5">
   @csrf
       <div class="row no-gutters">
           <div class="col-md-12 mb-3">
               <label for="name">{{ __('Name') }}</label>
               <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Your Full Name" required>
                                   @error('name')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                   <div class="col-md-12">
                       <label for="email">{{ __('EMail') }}</label>
                   </div>
                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Your Email" required>
                   @error('email')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                   <div class="col-md-12">
                       <label for="phone">{{ __('Phone') }}</label>
                       <input type="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" autocomplete="phone" placeholder="Your Number" required>
                       @error('number')
                                       <span class="invalid-feedback" role="alert">
                                           <strong>{{ $message }}</strong>
                                       </span>
                                   @enderror
                   </div>
           </div>
       </div>
       <div class="row no-gutters">
           <div class="col-md-12">
              <label for="files" class="btn btn-primary btn1">{{ __('Upload Video') }}</label>
               <input id="files" style="visibility:hidden;" type="file" accept="video/*">
               <button class="btn btn-primary btn1" type="submit">{{ __('Submit') }}</button>
           </div>
       </div>
   </form> -->

<div class="container-fluid">

    <div class="back">
        <form class="form mt-5" method="POST" action="{{ route('login') }}">
            {{csrf_field()}}
            <div class="row no-gutters">
                <div class="col-lg-12 text-center">
                    <h3 class="text-white">Log In</h3>
                </div>
            </div>
            <div class="row no-gutters">

                <div class="col-lg-12">
                    <label for="email" class="text-white ml-5 pl-5">{{ __('Email') }}</label>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <input id="email" type="email" class="mx-auto form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Email"
                        required>
                    @error('email')
                    <span class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-12 mt-3">
                    <label class="text-white ml-5 pl-5" for="password">{{ __('Enter Password') }} <i
                            class="fas fa-key"></i></label>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-12">
                    <input id="password" type="password"
                        class="mx-auto form-control @error('password') is-invalid @enderror" name="password"
                        value="{{ old('password') }}" autocomplete="password" autofocus placeholder="Password" required>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" style="margin-left:5rem; margin-top:10px;" type="checkbox"
                        id="gridCheck">
                    <label class="form-check-label text-white" style="margin-left:6.5rem; margin-top:4px;"
                        for="gridCheck">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-12 mt-1 ">
                    <button class="btn btn-outline-primary button1 text-center text-white"
                        type="submit">{{ __('Log In') }}</button>
                </div>
            </div>
            <div class="row no-gutters ">
                <div class="col-lg-12 text-white mt-3">
                    <p class="text-center">Do not have an account? </p>
                </div>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-12 text-white">
                    <a href="register"> <button
                            class="btn btn-outline-primary button1 text-center text-white">{{ __('Create Account') }}</button></a>
                </div>
            </div>
            <div class="row no-gutters mt-1">
                <div class="col-lg-12 mt-3 text-white pb-3">
                    <p class="text-center"> <b>OR</b></p>
                    <p class="text-center">Sign In with Your Social Account</p>
                    <div class="clear-fix"></div>
                    <a href="https://www.facebook.com/?stype=lo&jlou=AfdG9DgYsRIzWsHEpt7DTtlooaViQLG4QVyO3prOZ_3cnF0zOtfLLetXWiONsWNp0VUZEzlswhmD3BONFovtyQnhPboKtVYXKFbgGbSVVad_5A&smuh=13524&lh=Ac96DfiQARHajlxA"
                        class="btn btn-outline-primary  text-white button2"> <i class="fab fa-facebook-square"></i>
                        Facebook</a>
                    <a href="https://accounts.google.com/signin/v2/identifier?hl=en&continue=https%3A%2F%2Fmail.google.com%2Fmail&service=mail&flowName=GlifWebSignIn&flowEntry=AddSession"
                        class="btn btn-outline-primary text-white button2"><i class="fab fa-google-plus"> </i> Google
                    </a>
                    <a href="https://login.yahoo.com/" class="btn btn-outline-primary  text-white button2"><i
                            class="fab fa-yahoo"></i> Yahoo</a>
                </div>
            </div>
    </div>
    </form>

</div>
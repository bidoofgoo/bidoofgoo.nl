@extends('layouts.base')

@section('content')
   <div class="PageContents">
      <div class="MainPageContent">
         <article>
            <h2>Login</h2>
            <div class="artcontent">
               <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                  @csrf

                  <div class="form-group row">
                     <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                     <div class="col-md-6">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('email') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>

                  <div class="form-group row">
                     <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                     <div class="col-md-6">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                        @if ($errors->has('password'))
                           <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('password') }}</strong>
                           </span>
                        @endif
                     </div>
                  </div>

                  <div class="form-group row">
                     <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                           <label class="form-check-label" for="remember">
                              {{ __('Remember Me') }}
                           </label>
                        </div>
                     </div>
                  </div>

                  <div class="form-group row mb-0">
                     <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                           {{ __('Login') }}
                        </button>
                     </div>
                  </div>
               </form>
            </div>
         </article>
      </div>
      <div class="SecondairyPageContent">
         <h2>Are you really Bidoofgoo?</h2>
         <div class="artcontent">
            Hey there kiddo, if you're not Bidoofgoo, you're not really supposed to be here... How did you get here anyway?
            Well... how will I deal with this? Can you please click this button for me please?<br><br>
            <div class="button" onclick="goto('{{url('/deleteThisHacker')}}')">
               Harmless Button
            </div>
         </div>
      </div>
   </div>
@endsection

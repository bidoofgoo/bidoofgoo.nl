@extends('layouts.base')

@section('title')
   Bidoofgoo.nl - Contact
@endsection

@section('content')
    <article class="contactmenowples">
      <h2>Contact me!</h2>
      <div class="artcontent">
         Do you have a bussiness inquiry? Do you have a burning question that only I can answer? Fill in the form below and press send and I'll try to answer as soon as possible!
         <br><br>
         @if(count($errors) > 0)
           <div style="color:red">
             You appear to not have filled in the form correctly.
             <ul>
               @foreach ($errors->all() as $err)
                 <li>{{ $err }}</li>
               @endforeach
             </ul>
             <br>
           </div>
         @endif

         @if ($message = Session::get('success'))
           <div style="color:green">
             {{ $message }}
           </div>
         @endif
         <form style="text-align: left"action="{{ url('contact/sendMail') }}" method="post">
           {{ csrf_field() }}
           <div class="form-group">
             <label>Enter your name</label>
             <input type="text" name="name">
           </div>
           <div class="form-group">
             <label>Enter your email</label>
             <input type="text" name="mail">
           </div>
           <div class="form-group">
             <label>Your message:</label>
             <textarea name="message" rows="8" cols="80"></textarea>
           </div>
           <div class="form-group">
             <input type="submit" name="send" value="Send me your question">
           </div>
         </form>
      </div>
   </article>
@endsection

@extends('template')

@section('content')
  <h4>login</h4>
  <div class="row ">
  <form class="col s12 my3" action="{{url('/login')}}" method="post">
    @csrf
    <div class="row">
      <div class="input-field col s12">
        <input   type="text" class="validate" name="email">
        <label for="">Email</label>
      </div>
    
    </div>
  
    <div class="row">
      <div class="input-field col s12">
        <input id="password" type="password" class="validate" name="psw">
        <label for="password">Password</label>
      </div>
    </div>
    <div class="row">
        <div class="col">
        <button class="waves-effect waves-light btn" type="submit" >submit</button>
        </div>
    </div>
    
  </form>
  </div>
@endsection

  

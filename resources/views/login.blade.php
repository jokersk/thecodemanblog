<link rel="stylesheet" href="{{asset('css/app.css')}}">
<link rel="stylesheet" href="{{asset('css/login.css')}}">
<div class="container">
  <h4>Login</h4>
  
  <div class="">
    <form class="" action="{{url('/login')}}" method="post">
      @csrf
      
      
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" class="form-control" name="email"  placeholder="Enter email">
        </div>
      
    
      
        <div class="form-group">
          <label for="password">Password</label>
          <input id="password" type="password" class="validate  form-control" name="psw">  
        </div>
      
      
          
          <button class="btn btn-primary" type="submit" >submit</button>
          
      
      
    </form>
  </div>

  
</div>


  

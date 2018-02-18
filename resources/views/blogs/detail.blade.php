<link rel="stylesheet" href="{{asset('css/app.css')}}">

<div class="container">

<h4>{{ $blog? $blog->title : 'blog' }}</h4>
<div class="row ">
<form class="col s12 my3" action="{{url('blogs/create')}}" method="post">
  @csrf
    @if($blog)
        <input type="hidden" name="id" value="{{$blog->id}}">
    @endif


  <div class="row">
    <div class="input-field col s12">
      <input  type="text" class="validate" name="title" value="{{$blog? $blog->title : ''}}">
      <label  for="">Title</label>
    </div>
  
  </div>

    <div class="row">
        <div class="input-field col s12">
          <textarea name="content" id="textarea1" class="materialize-textarea">{{$blog ? $blog->content : ''}}</textarea>
          <label for="textarea1">Textarea</label>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <button class="waves-effect waves-light btn" type="submit" >submit</button>
        </div>
    </div>
  
</form>
</div>


  
</div>

<script src="{{asset('js/app.js')}}"></script>